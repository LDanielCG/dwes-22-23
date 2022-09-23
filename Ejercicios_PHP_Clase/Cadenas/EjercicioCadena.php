<?php
        $texto = '';
        $error = false;
        if(isset($_GET['texto'])) {
            $texto = $_GET['texto'];
            if($texto == ''){
                $texto = '';
                $error = true;
            }
        } else {
            $texto = '';
        }


    $contVoc = 0;
    $contCons = 0;
    for($i=0; $i < strlen($texto);$i++){
        if(($texto[$i] == 'a') || ($texto[$i] == 'e') || ($texto[$i] == 'i') || ($texto[$i] == 'o') || ($texto[$i] == 'u')){
            $contVoc++;
        } else{
            $contCons++;
        }
    }
    $pali = 'No';
    $contadorNo = 0;
    for($j=0; $j < floor(strlen($texto)/2); $j++){
        
        if($texto[$j] != ($texto[(strlen($texto))-($j+1)])){
            $contadorNo++;
        }
        
        if($contadorNo != 0){
            $pali = 'No';
        } else{
            $pali = 'Si';
        }

//    echo $texto[$j] . "<br>";
//  echo $texto[(strlen($texto))-($j+1)] . "<br>";

}
//  echo floor(strlen($texto)/2);
//  echo strlen($texto);
?>




<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body{
            background-color: darkslategray;
            font-family: 'Lucida Console',monospace;
        }
        .pageCONT {
            display: flex;
            justify-content: center;
            align-items: center;
            height:90vh;
        }
        .mainCont{
            background-color: rgba(55, 46, 95, 0.5);
            padding: 20px;
            border: 3px solid #2a2a3c;
            width: 300px;
            height: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;  
            justify-content: flex-start;
        }
        .contResult {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form{
            display: flex;
            flex-direction: column;
           
        }
        label,li{
            text-shadow: 0 0 5px aqua;
            color: aqua;
            font-size: 12px;
            padding-bottom: 5px;
        }
        .resultados {
            text-shadow: 0 0 5px #f96bb8;
            color: #f96bb8;
        }
        .textoInp {
            filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0));
            transform: scale(1);
            margin:5px;
            transition: 0.5s;
        }
        .textoInp:hover {
            filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.86));
            transform: scale(1.1);
        }
        .boton {
            margin:2px;
            transform: scale(1);
            filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0));
            transition: 0.5s;
        }
        .boton:hover {
            transform: scale(1.1);
            filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.86));
        }
        .error {
            text-shadow: 0 0 7px #ff0030;
            color: #ff2c54;

            border: 1px solid #ff0030;
            padding: 30px 97px;
            margin:0;

        }
        .noError {
            text-shadow: 0 0 7px #00000000;
            color: #545454;

            border: 1px solid gray;
            padding: 30px 80px;
            margin:0;
        }
      
    </style>
</head>
<body>
    <div class="pageCONT">
        <div class="mainCont">
            <form action="" method="get">
                <label>Escribe algo:</label> <input class="textoInp" type="text" name="texto" id="" value="<?=$texto?>" ><br>
                <input class="boton" type="submit" value="Enviar">
            </form>

            <div class="contResult">
                <ul>
                    <li>Numero de vocales: <span class="resultados"><?php echo $contVoc ?></span> </li>
                    <li>Numero de consonantes: <span class="resultados"><?php echo $contCons ?></span> </li>
                    <li>Palíndromo: <span class="resultados"><?php echo $pali ?></span> </li>
                </ul>
                <?php if($error){
                    echo '<h3 class="error">ERROR</h3>';
                }else{
                    echo '<h3 class="noError">NO ERROR</h3>';
                } ?>
            </div>
        </div>
    </div>
</body>
</html>