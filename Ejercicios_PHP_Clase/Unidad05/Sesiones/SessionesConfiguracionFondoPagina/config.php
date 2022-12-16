<?php
    include("SESION.php");
    if(isset($_POST['Guardar'])){
        array_pop($_POST);
        foreach($_POST as $key => $value){
            $_SESSION[$key] = $value;
        }
    }
    include("defaultValues.php");

    echo "SESSION: <br>";
    print_r($_SESSION);
    echo "<br><br><br>";
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Config</title>
    <?php include("./css/estilos.php")?>
</head>
<body>
    <div class="cont">
        <?php include("./textos/texto4.php")?>

        <form action="" method="post">
            <label>
                BG-COLOR: 
                <input type="color" name="BG" value=<?=$BG?>>
            </label>
            <label>
                FG-COLOR: 
                <input type="color" name="FG" value=<?=$FG?>>
            </label>
            <label>
                NAME: 
                <input type="text" name="NAME" value=<?=$NAME?>>
            </label>
            <input type="submit" value="Guardar" name="Guardar">
        </form>

        <?php include("menu.php")?>
    </div>
</body>
</html>