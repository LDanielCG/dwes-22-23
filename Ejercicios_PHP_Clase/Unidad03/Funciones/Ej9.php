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
        $par1 = 1;
        $par2 = "a";

        function intercambio(&$param1, &$param2){
            $aux = $param1;
            $param1 = $param2;
            $param2 = $aux;
            //echo "Parametro 1 => ".$param1." || Prametro 2 => ".$param2;
        }
        
        echo "Antes de la funcion: P1 => $par1 || P2 => $par2 <br>";

        intercambio($par1,$par2);

        echo "<br>Despues de la funcion: P1 => $par1 || P2 => $par2";
    
    
    ?>
</body>
</html>