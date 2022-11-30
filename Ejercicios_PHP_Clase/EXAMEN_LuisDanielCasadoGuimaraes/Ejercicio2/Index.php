<?php
    spl_autoload_register(function($class) {
        $path = "./Clases/";
        $file = str_replace('\\', '/', $class);
        require("$path${file}.php");
    });

    $examen1 = new ExamenFacil;
    $examen1->intentar("Daniel");
    
    $examen2 = new ExamenChungo;
    $examen2->intentar("Shirou");

    $examen3 = new ExamenHP;
    $examen3->intentar("Issei");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2</title>
</head>
<body>
    <h2>Ejercicio 2</h2>
    <?php
        echo "<h3>Examen fácil:</h3>";
        echo "<p>".$examen1->getNombre()." ha sacado un ".$examen1->obtenerNota()."</p>";
        echo "<h3>Examen chungo:</h3>";
        echo "<p>".$examen2->getNombre()." ha sacado un ".$examen2->obtenerNota()."</p>";
        echo "<h3>Examen HP:</h3>";
        echo "<p>".$examen3->getNombre()." ha sacado un ".$examen3->obtenerNota()."</p>";
    ?>
</body>
</html>