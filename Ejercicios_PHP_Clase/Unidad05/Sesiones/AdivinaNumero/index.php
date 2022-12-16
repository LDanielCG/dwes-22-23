<?php
    session_name("EjercicioAdivinarNumeros");
    session_start();
    $MIN = 0;
    $MAX = 10;
    $NUM_INTENTOS = 3;



    $numRand = isset($_SESSION['random'])?$_SESSION['random']:rand($MIN, $MAX);
    $intentos = isset($_SESSION['intentos'])?$_SESSION['intentos']:$NUM_INTENTOS;

    $_SESSION['random'] = $numRand;
    $_SESSION['intentos'] = $intentos;


    
        if(isset($_POST['enviar'])){
            if(isset($_POST['guess'])){

                $guess = $_POST['guess'];
    
                if(comprobarNumero($numRand,$guess)){
                    echo "<h3 class='correcto'>CORRECTO!</h3>";
                }else{
                    if($_SESSION['intentos'] > 1){
                        $intentos--;
                        $_SESSION['intentos'] = $intentos;
                        echo "<h3 class='incorrecto'>INCORRECTO!</h3>";
                    }else{
                        $intentos--;
                        $_SESSION['intentos'] = $intentos;
                        echo "<h3 class='incorrecto'>HAS AGOTADO LOS INTENTOS!</h3>";
                    }
                }
            }
        }else if(isset($_POST['reiniciar'])){
            session_destroy();
            header("Location: index.php");
        }
    

    function comprobarNumero($rand,$guess){
        if($rand == $guess){
            return true;
        }else if($rand < $guess){
            echo "<p>El numero es menor a $guess</p>";
            return false;
        }else if($rand > $guess){
            echo "<p>El numero es mayor a $guess</p>";
            return false;
        }
    }

    /*
    echo "POST: <br>";
    print_r($_POST);
    echo "<br><br>SESSION: <br>";
    print_r($_SESSION);
    */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Adivina el numero</title>
</head>
<body>
    <h2>Adivina el numero entre <?=$MIN?> y <?=$MAX?></h2>
    <form action="" method="post">
        <input type="text" name="guess">
        <input type="submit" value="enviar" name="enviar">
        <input type="submit" value="reiniciar" name="reiniciar">
    </form>
    <p>Numero de intentos: <?=$intentos?></p>
</body>
</html>