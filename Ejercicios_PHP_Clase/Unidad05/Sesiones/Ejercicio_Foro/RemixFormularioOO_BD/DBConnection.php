<?php
    //Establecer conexión con la BBDD.
    use Formulario\claseBD;
    $dsn = 'mysql:host=localhost;dbname=basededatosclase';
    $user = $passwd = "alumno";
    $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
    $baseDeDatos = new claseBD($dsn, $user, $passwd,$options);
?>