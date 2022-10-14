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
        
        function funcionEj11(array $array){
            $elevEnt = 2;

            for($i = 0; $i < sizeof($array); $i++){

                if(is_int($array[$i])){
                    $array[$i] = pow($array[$i],$elevEnt);
                    $elevEnt++; 
                }elseif(is_float($array[$i])){
                    $array[$i] = $array[$i]*-1;
                }elseif(is_string($array[$i])){
                    if($array[$i] === strtoupper($array[$i])){
                        $array[$i] = strtolower($array[$i]);
                    }else{
                        $array[$i] = strtoupper($array[$i]);
                    }
                }
            }
            return $array;
        }

        $arrEj11 = [
            0 => 2,
            1 => "hola",
            2 => 3,
            3 => "ADIOS",
            4 => 3.14,
            5 => -2.06
        ];

        echo "<br>Array antes de la funcion:<br>";
        print_r($arrEj11);
        echo "<br><br>Array despues de la funcion:<br>";
        print_r(funcionEj11($arrEj11));
    
    
    ?>
</body>
</html>