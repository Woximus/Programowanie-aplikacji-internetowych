//Narzedzia
import { Component } from '@angular/core'; //Widok
import { CommonModule } from '@angular/common';  // Instrukcje
import { FormsModule } from '@angular/forms'; //Formularz

//role
type Role = 'admin' | 'user' | 'guest' | null;

// Struktura Tabeli
interface User {
  id: number;
  login: string;
  haslo: string;
  rola: Role;
}

// glowny app-root ma uzywac app.html i app.css
@Component({
  selector: 'app-root',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './app.html',
  styleUrl: './app.css'
})
// pojemniki na dane
export class App {
  // Tabela uzytkownikow
  usersDB: User[] = [
    { id: 1, login: 'manager', haslo: 'admin123', rola: 'admin' },
    { id: 2, login: 'uzytkownik', haslo: 'user123', rola: 'user' },
    { id: 3, login: 'nowak', haslo: 'user123', rola: 'user' },
    { id: 4, login: 'krawczyk', haslo: 'user123', rola: 'user' },
    { id: 5, login: 'gosc', haslo: 'gosc123', rola: 'guest' }
  ];

  isLoggedIn = false;
  currentRole: Role = null;
  // co sie wpisze 
  loginInput = '';
  passInput = '';

  // Pola kalkulatora
  kwota: string = '';
  lata: string = '';
  procent: string = '';

  filterText: string = '';

  //Zmiene do edycji
  editingUserId: number | null = null;
  editFormData: any = {}; // Tymczasowa zmienna 

  // Wyniki
  errors: string[] = []; 
  wynik: number | null = null;
  calkowitaKwota: number | null = null;

  usunUzytkownika(id: number) {
    // Okienko z potwierdzeniem
    if (confirm("Czy na pewno chcesz usunąć tego użytkownika z bazy?")) {
      // Cala baza bez tego uzytkownika
      this.usersDB = this.usersDB.filter(u => u.id !== id);
    }
  }
  edytujUzytkownika(user: User) {
    this.editingUserId = user.id;
    // Dane uzytkownika kopia
    this.editFormData = { ...user };
  }

  zapiszEdycje() {
    // Pozycja tego uzytkownika
    const index = this.usersDB.findIndex(u => u.id === this.editingUserId);
    if (index !== -1) {
      // stare -> nowe
      this.usersDB[index] = { ...this.editFormData };
    }
    // Koniec trybu
    this.editingUserId = null;
  }

  anulujEdycje() {
    this.editingUserId = null;
  }


  login() {
    // Szukam użytkownika w bazie, który ma podany login i hasło
    const foundUser = this.usersDB.find(
      u => u.login === this.loginInput && u.haslo === this.passInput
    );

    if (foundUser) {
      this.isLoggedIn = true;
      this.currentRole = foundUser.rola;
    } else {
      alert("Błędne dane logowania! Nie znaleziono w bazie.");
    }
  }

  //Wylogowanie
  logout() {
    this.isLoggedIn = false;
    this.currentRole = null;
    this.wynik = null;
    this.calkowitaKwota = null;
    this.errors = [];
    this.kwota = '';
    this.lata = '';
    this.procent = '';
    this.loginInput = '';
    this.passInput = '';
    this.filterText = ''; // Czyszczenie filtru
  }

  // Filtrowanie
  get filteredUsers(): User[] {
    if (!this.filterText) {
      return this.usersDB; // Jesli nic 
    }
    // Zamieniam na małe litery(Ignoruje tak wielkosc liter)
    const filterLower = this.filterText.toLowerCase();
    
    return this.usersDB.filter(u => 
      u.login.toLowerCase().includes(filterLower) || 
      (u.rola && u.rola.toLowerCase().includes(filterLower))
    );
  }

  oblicz() {
    this.errors = [];
    this.wynik = null;
    this.calkowitaKwota = null;

    //jesli nie zalogowany lub gosc
    if (!this.isLoggedIn || this.currentRole === 'guest') {
      this.errors.push("Błąd: Brak uprawnień do obliczeń.");
      return;
    }

    //zamienia , na .
    const S = Number(this.kwota.replace(',', '.'));
    const L = Number(this.lata.replace(',', '.'));
    const p = Number(this.procent.replace(',', '.'));

    // czy nie puste, numer , czy nie na minusie
    if (!this.kwota || isNaN(S) || S <= 0) this.errors.push("Kwota musi być liczbą dodatnią.");
    if (!this.lata || isNaN(L) || L <= 0 || !Number.isInteger(L)) this.errors.push("Lata muszą być pełną liczbą dodatnią.");
    if (!this.procent || isNaN(p) || p < 0) this.errors.push("Oprocentowanie nie może być ujemne.");

    if (this.currentRole === 'user' && p > 5) {
      this.errors.push("Odmowa dostępu: Jako Użytkownik nie możesz przekroczyć 5%!");
    }

    //jesli nie ma bledu
    if (this.errors.length === 0) {
      const n = L * 12; 
      const r = (p / 100) / 12; 

      if (r > 0) {
        this.wynik = (S * r * Math.pow(1 + r, n)) / (Math.pow(1 + r, n) - 1);
      } else {
        this.wynik = S / n; 
      }
      this.calkowitaKwota = this.wynik * n;
    }
  }
}