import { Component } from '@angular/core';
import { CommonModule } from '@angular/common'; 
import { FormsModule } from '@angular/forms';

type Role = 'admin' | 'user' | 'guest' | null;

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './app.html',
  styleUrl: './app.css'
})
export class App {
  // Stan logowania
  isLoggedIn = false;
  currentRole: Role = null;
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
    } else if (this.loginInput === 'kowalski' && this.passInput === 'user123') {
      this.isLoggedIn = true;
      this.currentRole = 'user';
    } else if (this.loginInput === 'gosc' && this.passInput === 'gosc123') {
      this.isLoggedIn = true;
      this.currentRole = 'guest';
    } else {
      alert("Błędne dane logowania!");
    }
  }

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

    if (!this.isLoggedIn || this.currentRole === 'guest') {
      this.errors.push("Błąd: Brak uprawnień do obliczeń.");
      return;
    }

    const S = Number(this.kwota.replace(',', '.'));
    const L = Number(this.lata.replace(',', '.'));
    const p = Number(this.procent.replace(',', '.'));

    if (!this.kwota || isNaN(S) || S <= 0) this.errors.push("Kwota musi być liczbą dodatnią.");
    if (!this.lata || isNaN(L) || L <= 0 || !Number.isInteger(L)) this.errors.push("Lata muszą być pełną liczbą dodatnią.");
    if (!this.procent || isNaN(p) || p < 0) this.errors.push("Oprocentowanie nie może być ujemne.");

    if (this.currentRole === 'user' && p > 5) {
      this.errors.push("Odmowa dostępu: Jako Użytkownik nie możesz przekroczyć 5%!");
    }

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