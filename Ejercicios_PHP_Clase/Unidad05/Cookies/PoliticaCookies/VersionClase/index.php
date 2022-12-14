<?php
    //El usuario acepta?
    if(isset($_GET['accion']) && $_GET['accion'] == 'aceptar'){
        setcookie("verificado",1);
        $mensajeCookies = false;
    }

    if(isset($_COOKIE['verificado']) && $_COOKIE['verificado'] == 1){
        $mensajeCookies = false;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        #cookies {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: grey;
        }
    </style>
</head>
<body>
    <h1>Bienvenido</h1>
    <div id="cookies">
        <a href="?accion=aceptar">Aceptar</a>
        <a href="?accion=rechazar">Rechazar</a>
    </div>
</body>
</html>