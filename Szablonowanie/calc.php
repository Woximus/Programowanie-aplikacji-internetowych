<?php
// 1. Pobranie parametrów
$kwota = $_GET['kwota'] ?? "";
$lata = $_GET['lata'] ?? "";
$procent = $_GET['oprocentowanie'] ?? "";

$errors = []; // tablica na bledy
$wynik = null;

// 2. Walidacja
if (isset($_GET["kwota"])) {
	// Kwota
    if ($kwota == "") {
        $errors[] = "Pole 'Kwota' nie może być puste !!!";
    } elseif (!is_numeric($kwota)) {
        $errors[] = "W polu 'Kwota' musi być liczba !!!";
    } elseif ($kwota <= 0) {
        $errors[] = "Kwota nie moze byc ujemna !!!";
    }
	// Lata
    if ($lata == "") {
        $errors[] = "Pole 'Lata' nie może być puste !!!";
    } elseif (!is_numeric($lata)) {
        $errors[] = "W polu 'Lata' musi być liczba !!!";
    } elseif ($lata <= 0) {
        $errors[] = "Liczba lat nie moze byc ujemna !!!";
    }
	
	// Procent
    if ($procent == "") {
        $errors[] = "Pole 'Oprocentowanie' nie może być puste !!!";
    } elseif (!is_numeric($procent)) {
        $errors[] = "W polu 'Oprocentowanie' musi być liczba !!!";
    } elseif ($procent < 0) {
        $errors[] = "Oprocentowanie nie może być ujemne !!!";
    }
	if (empty($errors)) {
        // 3. Obliczenia
        $S = floatval($kwota);
        $n = intval($lata) * 12;
        $r = floatval($procent) / 100 / 12;

        if ($r > 0) {
            $wynik = $S * $r * pow(1 + $r, $n) / (pow(1 + $r, $n) - 1);
        } else {
            $wynik = $S / $n;
        }
        $calkowita_kwota = $wynik * $n;
    }
}

//wywolanie
include "szablon.php";
?>