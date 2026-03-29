<<<<<<< HEAD
<?php
// 1. Pobranie parametrów
$kwota = $_GET["kwota"] ?? "";
$lata = $_GET["lata"] ?? "";
$procent = $_GET["oprocentowanie"] ?? "";

$error = "";
$wynik = null;

// 2. Walidacja
if (isset($_GET["kwota"])) {
    if ($kwota == "" || $lata == "" || $procent == "") {
        $error = "Wszystkie pola muszą być wypełnione.";
    } else if (!is_numeric($kwota) || !is_numeric($lata) || !is_numeric($procent)) {
        $error = "Wartości muszą być liczbami.";
    } else {
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

include "calc_view.php";
=======
<?php
// 1. Pobranie parametrów
$kwota = $_GET["kwota"] ?? "";
$lata = $_GET["lata"] ?? "";
$procent = $_GET["oprocentowanie"] ?? "";

$error = "";
$wynik = null;

// 2. Walidacja
if (isset($_GET["kwota"])) {
    if ($kwota == "" || $lata == "" || $procent == "") {
        $error = "Wszystkie pola muszą być wypełnione.";
    } else if (!is_numeric($kwota) || !is_numeric($lata) || !is_numeric($procent)) {
        $error = "Wartości muszą być liczbami.";
    } else {
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

include "calc_view.php";
>>>>>>> b12d5d023021a87544eaa5bf55cc7131d009b57f
?>