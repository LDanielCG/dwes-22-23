<?php
    $temazo="";
    $hora=date("h");
    $min=date("i");
    //echo $min;

    $opcionesMinuto = [0,15,30,45];

    $mayores = array_filter($opcionesMinuto,function($m){
        global $min;
        return $m > $min;
    });

    if(empty($mayores)){
        $min = 0;
        $hora++;
    }else {
        $min = array_shift($mayores);
    }

    //Ver si el usuario envia la informacion
    $errores = [];

    if(isset($_POST['enviar'])){
        //Verificar errores
        if(isset($_POST['temazo']) && $_POST['temazo'] != ""){
            $temazo = $_POST['temazo'];
        } else{
            $errores['temazo'] = 'No puede estar vacio';
        }
    
        if(isset($_POST['hora']) && $_POST['hora'] != ""){
            $hora = $_POST['hora'];
        } else{
            $errores['hora'] = 'No puede estar vacio';
        }
    
        if(isset($_POST['min']) && $_POST['min'] != ""){
            $min = $_POST['min'];
        } else{
            $errores['min'] = 'No puede estar vacio';
        }
    
        if(count($errores) == 0){
            //Guardo
            file_put_contents(
                "temazos.csv",
                "$temazo;$hora;$min\n",
                FILE_APPEND
            );
            //redirect
            header("Location: listado.php");
            exit();
        }
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: red;
            font-size: 0.7em;
            margin-bottom: 0.5em;
        }

        .error p {
            margin: 0;

        }
    </style>
</head>
<body>
    
    <form action="" method="POST">
        <label for="temazo">Tema música:</label><br>
        <input type="text" name="temazo" id="tema" value="<?=$temazo?>" placeholder="Pon tu temazo"><br>
        <?php
            if(isset($errores['temazo'])){
                echo '<div class="error">';
                echo '<p>'.$errores['temazo'].'</p>';
                echo '</div>';
            }
        ?>
        <label for="hora">HH:</label>
        <input type="number" max="23" size="1" name="hora" id="hora" value="<?=$hora?>" style="width: 50px;">
        <label for="minuto">MM:</label>
        <select name="min" id="min">
            <?php
                array_walk($opcionesMinuto,function($op, $k, $d){ //$d es $min
                    $sel = ($op == $d)?"selected":"";
                    echo "<option value='$op' $sel>$op</option>";
                },$min);
            ?>
        </select><br>
        <?php
            if(isset($errores['hora'])){
                echo '<div class="error">';
                echo '<p>'.$errores['hora'].'</p>';
                echo '</div>';
            }
            if(isset($errores['min'])){
                echo '<div class="error">';
                echo '<p>'.$errores['min'].'</p>';
                echo '</div>';
            }
        ?>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>