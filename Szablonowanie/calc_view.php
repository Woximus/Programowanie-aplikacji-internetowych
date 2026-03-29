<<<<<<< HEAD

<div class="card">
    <h2>Kalkulator</h2>
    
    <form action="calc.php" method="GET">
        <label>Kwota kredytu:</label>
        <input type="text" name="kwota" value="<?php echo $kwota; ?>"><br>

        <label>Okres (lata):</label>
        <input type="text" name="lata" value="<?php echo $lata; ?>"> <br>

        <label>Oprocentowanie (%):</label>
        <input type="text" name="oprocentowanie" value="<?php echo $procent; ?>"> <br>

        <button type="submit" class="btn-calc">Oblicz ratę</button>
    </form>

    <div class="error">
        <?php
			if (isset($errors) && count($errors) > 0) {
                echo "<ul>";
                foreach ($errors as $err) {
                    echo "<li>$err</li>";
                }
                echo "</ul>";
            }
        ?>
    </div>

    <div class="result">
        <?php
            if (isset($wynik) && empty($errors))	 {
                echo "Miesięczna rata: " . number_format($wynik, 2, ',', ' ') . " PLN<br>";
                echo "Suma do spłaty: " . number_format($calkowita_kwota, 2, ',', ' ') . " PLN";
            }
        ?>
    </div>
</div>
=======

<div class="card">
    <h2>Kalkulator</h2>
    
    <form action="calc.php" method="GET">
        <label>Kwota kredytu:</label>
        <input type="text" name="kwota" value="<?php echo $kwota; ?>"><br>

        <label>Okres (lata):</label>
        <input type="text" name="lata" value="<?php echo $lata; ?>"> <br>

        <label>Oprocentowanie (%):</label>
        <input type="text" name="oprocentowanie" value="<?php echo $procent; ?>"> <br>

        <button type="submit" class="btn-calc">Oblicz ratę</button>
    </form>

    <div class="error">
        <?php
			if (isset($errors) && count($errors) > 0) {
                echo "<ul>";
                foreach ($errors as $err) {
                    echo "<li>$err</li>";
                }
                echo "</ul>";
            }
        ?>
    </div>

    <div class="result">
        <?php
            if (isset($wynik) && empty($errors))	 {
                echo "Miesięczna rata: " . number_format($wynik, 2, ',', ' ') . " PLN<br>";
                echo "Suma do spłaty: " . number_format($calkowita_kwota, 2, ',', ' ') . " PLN";
            }
        ?>
    </div>
</div>
>>>>>>> b12d5d023021a87544eaa5bf55cc7131d009b57f
