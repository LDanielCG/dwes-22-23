<?php
    require_once("claseBD.php");
    use Ejercicio3\claseBD as claseBD;

    $nav = $_SERVER["HTTP_USER_AGENT"];
    $fecha = time();
    
    //Echos de testeo.
    //echo "<br>Sin formato: ".$fecha;
    //$fechaFormateada = date("Y-m-d H:i:s",$fecha);  
    //echo "<br>Formateado: ".$fechaFormateada;
    //echo "<br><br><br>";

    //Array con los datos para enviarlo a la Base de datos.
    $datos = ["naveg" => $nav,"fecha" => $fecha];
    //print_r($datos);

    //Establecer conexión con la BBDD.
    $dsn = 'mysql:host=localhost;dbname=examen';
    $user = $passwd = "examen";
    $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
    $baseDeDatos = new claseBD($dsn, $user, $passwd,$options);

    //Guardar en la DB.
    $baseDeDatos->insertarValores($datos);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3</title>
</head>
<body>
    <h3>Hola Mundo</h3>
    <a href="./lista.php">Ver Logs</a>
</body>
</html>