<?php
    $temazo="";
    $hora=date("h");
    $min=date("i");
    echo $min;

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
        if(isset($_POST['tema']) && $_POST['tema'] != ""){
            $temazo = $_POST['tema'];
        } else{
            $errores['temazo'] = 'No puede estar vacio';
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
        <label for="tema">Tema música:</label><br>
        <input type="text" name="cancion" id="tema" value="<?=$temazo?>" placeholder="Pon tu temazo"><br>
        <div class="error">
            <p>error 1</p>
            <p>error 2</p>
        </div>
        <label for="hora">HH:</label>
        <input type="number" max="23" size="1" name="hora" id="hora" value="<?=$hora?>" style="width: 50px;">
        <label for="minuto">MM:</label>
        <select name="" id="">
            <?php
                array_walk($opcionesMinuto,function($op, $k, $d){
                    $sel = ($op == $d)?"selected":"";
                    echo "<option value='$op' $sel>$op</option>";
                },$min);
            ?>
        </select><br>
        <div class="error">
            <p>error 1</p>
        </div>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>