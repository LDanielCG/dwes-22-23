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
    
        function arrAlVariable($numValores = 10, $valMax = 10, $valMin = 0){
            for($i = 0; $i < $numValores; $i++){
                $array[$i] = mt_rand($valMin,$valMax);
            }
            
            return $array;
        }
    
        echo "<br>Sin parametros:<br>";
        print_r(arrAlVariable());
        echo "<br><br>Con parametros: 3 valores, 10 maximo, 5 minimo:<br>";
        print_r(arrAlVariable(3,10,5));
    ?>
</body>
</html>