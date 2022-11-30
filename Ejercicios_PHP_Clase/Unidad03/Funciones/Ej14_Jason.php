<?php
    function imprimeTabulado($cosas, $tab = 0) {
        $aux = '';
        for($i = 0; $i < $tab; $i++){
            $aux .= '_';
        }

        foreach ($cosas as $key => $value) {
            if (is_array($value)) {
                echo $aux.gettype($value)."<br>";
                imprimeTabulado($value, ($tab + 5));
            } else {
                echo  $aux.$value."<br>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio14</title>
</head>
<body>
    <h2>Ejercicio14</h2>
    <?php
        $cosas = [
            3,
            "frutas"  => ["a" => "naranja", "b" => [1, 2], "c" => "manzana"],
            "números" => [1, 2, 3, 4, 5, 6],
            "hoyos"   => ["primero", 5 => "segundo", "tercero"],
            "asd"
        ];

        imprimeTabulado($cosas);
    ?>
</body>
</html>