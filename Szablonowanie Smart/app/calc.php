<?php
//Niezbędne wczytanie konfiguracji i biblioteki Smarty
require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH.'/lib/libs/Smarty.class.php';
use Smarty\Smarty;

// 1. Pobranie parametrów
$kwota = $_POST['kwota'] ?? ""; 
$lata = $_POST['lata'] ?? "";
$procent = $_POST['oprocentowanie'] ?? "";

$errors = []; 
$wynik = null;
$calkowita_kwota = null;

// 2. Walidacja
if (isset($_POST["kwota"])) {
    if ($kwota == "") {
        $errors[] = "Pole 'Kwota' nie może być puste !!!";
    } elseif (!is_numeric($kwota) || $kwota <= 0) {
        $errors[] = "Kwota musi być dodatnią liczbą !!!";
    }

    if ($lata == "") {
        $errors[] = "Pole 'Lata' nie może być puste !!!";
    } elseif (!is_numeric($lata) || $lata <= 0) {
        $errors[] = "Liczba lat musi być dodatnią liczbą !!!";
    }
    
    if ($procent == "") {
        $errors[] = "Pole 'Oprocentowanie' nie może być puste !!!";
    } elseif (!is_numeric($procent) || $procent < 0) {
        $errors[] = "Oprocentowanie nie może być ujemne !!!";
    }

    if (empty($errors)) {
        // 4. Obliczenia
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

        // 5. Obsluga Smarty
$smarty = new Smarty();

$smarty->setTemplateDir(_ROOT_PATH.'/templates');
$smarty->setCompileDir(_ROOT_PATH.'/app/templates_c');
$smarty->assign('app_url', _APP_URL);
$smarty->assign('page_title', 'Kalkulator kredytowy');

// dane z formularza
$smarty->assign('form', [
    'kwota' => $kwota,
    'lata' => $lata,
    'oprocentowanie' => $procent
]);

$smarty->assign('messages', $errors);

// Wyniki do przekazania
$smarty->assign('result', [
    'rata' => $wynik,
    'calkowita' => $calkowita_kwota
]);

// Wyświetlenie szablonu
$smarty->display(_ROOT_PATH.'/app/calc_view.html');