import { Component } from '@angular/core';
import { CommonModule } from '@angular/common'; 
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './app.html',
  styleUrl: './app.css'
})
export class App {
  kwota: string = '';
  lata: string = '';
  procent: string = '';

  errors: string[] = []; 
  wynik: number | null = null;
  calkowitaKwota: number | null = null;

  oblicz() {
    this.errors = [];
    this.wynik = null;
    this.calkowitaKwota = null;

    if (!this.kwota) this.errors.push("Pole 'Kwota' nie może być puste !!!");
    else if (isNaN(Number(this.kwota))) this.errors.push("W polu 'Kwota' musi być liczba !!!");
    else if (Number(this.kwota) <= 0) this.errors.push("Kwota nie moze byc ujemna !!!");

    if (!this.lata) this.errors.push("Pole 'Lata' nie może być puste !!!");
    else if (isNaN(Number(this.lata))) this.errors.push("W polu 'Lata' musi być liczba !!!");
    else if (Number(this.lata) <= 0) this.errors.push("Liczba lat nie moze byc ujemna !!!");

    if (!this.procent) this.errors.push("Pole 'Oprocentowanie' nie może być puste !!!");
    else if (isNaN(Number(this.procent))) this.errors.push("W polu 'Oprocentowanie' musi być liczba !!!");
    else if (Number(this.procent) < 0) this.errors.push("Oprocentowanie nie może być ujemne !!!");

    if (this.errors.length === 0) {
      const S = parseFloat(this.kwota);
      const n = parseInt(this.lata) * 12;
      const r = parseFloat(this.procent) / 100 / 12;

      if (r > 0) {
        this.wynik = (S * r * Math.pow(1 + r, n)) / (Math.pow(1 + r, n) - 1);
      } else {
        this.wynik = S / n;
      }
      this.calkowitaKwota = this.wynik * n;
    }
  }
}