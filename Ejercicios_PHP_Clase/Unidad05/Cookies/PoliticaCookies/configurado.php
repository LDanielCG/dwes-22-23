<?php

    if($_COOKIE['verificado'] != "aceptar"){

        setcookie("verificado","rechazar");

        header("Location: index.php");
        die();
    }

    echo "COOKIES: <br>";
    print_r($_COOKIE);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Configurado</title>
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
        }
        .accesoBoton {
            text-decoration: none;
            font-weight: bold;
            color:white;
            background-color: #3396ff;
            padding: 7px;
            border: 2px solid black;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h3>Hola, como has aceptado las cookies, has llegado hasta aquí.</h3>
    <a href="index.php" class="accesoBoton">Volver</a>
</body>
</html>