<?php

    if(isset($_POST['aceptar'])){
        setcookie("verificado","aceptar");
    }else if(isset($_POST['rechazar'])){
        setcookie("verificado","rechazar");

        header("Location: index.php");
    }


    echo "POST: <br>";
    print_r($_POST);
    echo "<br><br>COOKIES: <br>";
    print_r($_COOKIE);


    function error(){
        if($_COOKIE['verificado'] == 'rechazar'){
            echo "<h3 class='errorCookies'>DEBES ACEPTAR LAS COOKIES!</h3>";
        }
    }


    function pintarMensajeCookies(){
        if(!isset($_COOKIE['verificado']) || $_COOKIE['verificado'] == 'rechazar'){ ?>
            <div class="cookiesCont">
                <h2>Politica de Cookies</h2>
                <p>Acepta nuestra politica de cookies</p>
                <form action="" method="post">
                    <input type="submit" value="Aceptar" name="aceptar">
                    <input type="submit" value="Rechazar" name="rechazar">
                </form>
            </div>
        <?php }
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
        }
        .contenedorBienvenida {
            display: flex;
            flex-direction: column;
            align-content: center;
            align-items: center;
            justify-content: center;
        }
        .cookiesCont {
            border: 1px solid grey;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            position: fixed;
            bottom: 0;
            left: 0;
        }
        .cookiesCont h2 {
            margin: 0;
        }
        .cookiesCont input {
            padding: 5px;
            border: 1px solid grey;
            border-radius: 2px;
        }
        .cookiesCont input[value="Aceptar"] {
            background-color: #3396ff;
            color: white;
            border: 1px solid black;
        }
        .errorCookies{
            color: red;
            background-color: #dfdfdf;
            border: 2px solid #ff0000;
            width: fit-content;
            padding: 5px;
            border-radius: 2px;
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
    <div class="contenedorBienvenida">
        <h1>Bienvenido!</h1>
        <a href="configurado.php" class="accesoBoton">Acceso</a>
        <?=error()?>
    </div>
    <?=pintarMensajeCookies()?>

</body>
</html>