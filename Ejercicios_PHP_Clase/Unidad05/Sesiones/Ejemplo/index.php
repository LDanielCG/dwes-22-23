<?php
    session_name("manoloframework");
    session_start();
    print_r($_SESSION);

    $intentos = isset($_SESSION['intentos'])?$_SESSION['intentos']:4;
    $intentos--;
    $_SESSION['intentos'] = $intentos;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Te quedan <?=$intentos?></h1>
</body>
</html>