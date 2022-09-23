<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
        if($error){
            echo "<h3>ERROR.</h3>";
        }


    ?>
    <div>
        <form action="" method="get">
            Escribe algo: <input type="text" name="texto" id="" value="<?=$texto?>" ><br>
            <input type="submit" value="Enviar">
        </form>

        <div>
            <ul>
            <?php 
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

                   echo $texto[$j] . "<br>";
                   echo $texto[(strlen($texto))-($j+1)] . "<br>";

                }
              //  echo floor(strlen($texto)/2);
             //  echo strlen($texto);
            ?>



                <li>Numero de vocales: <?php echo $contVoc ?> </li>
                <li>Numero de consonantes: <?php echo $contCons ?> </li>
                <li>Palíndromo: <?php echo $pali ?> </li>
            </ul>
        </div>
    </div>
</body>
</html>