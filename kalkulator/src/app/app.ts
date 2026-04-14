//Narzedzia
import { Component } from '@angular/core'; //Widok
import { CommonModule } from '@angular/common';  // Instrukcje
import { FormsModule } from '@angular/forms'; //Formularz

//role
type Role = 'admin' | 'user' | 'guest' | null;

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
  isLoggedIn = false;
  currentRole: Role = null;
  // co sie wpisze 
  loginInput = '';
  passInput = '';

  // Pola kalkulatora
  kwota: string = '';
  lata: string = '';
  procent: string = '';

  // Wyniki
  errors: string[] = []; 
  wynik: number | null = null;
  calkowitaKwota: number | null = null;

  login() {
    if (this.loginInput === 'manager' && this.passInput === 'admin123') {
      this.isLoggedIn = true;
      this.currentRole = 'admin';
    } else if (this.loginInput === 'uzytkownik' && this.passInput === 'user123') {
      this.isLoggedIn = true;
      this.currentRole = 'user';
    } else if (this.loginInput === 'gosc' && this.passInput === 'gosc123') {
      this.isLoggedIn = true;
      this.currentRole = 'guest';
    } else {
      alert("Błędne dane logowania!");
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