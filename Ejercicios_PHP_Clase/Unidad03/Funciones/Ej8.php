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
    
        /*function analizParámetros(... $param){
            $enteros=0;
            $strings=0;
            $arrays=0;
            
            for($i = 0; $i < count($param); $i++){
                if(is_int($param[$i])){
                    $enteros++;
                    $ind_enteros = $i;
                    
                }elseif(is_string($param[$i])){
                    $strings++;
                    $ind_strings = $i;

                }elseif(is_array($param[$i])){
                    $arrays++;
                    $ind_arr = $i;
                }
            }

            return $arr = [
                gettype($param[$ind_enteros]) => $enteros,
                gettype($param[$ind_strings]) => $strings,
                gettype($param[$ind_arr]) => $arrays
            ];
        }*/

        function analizParámetros(... $param){
            $arr = [];
            foreach($param as $key => $value){
                @$arr[gettype($value)] += 1;
            }            
            return $arr;
        }
        $analisis = analizParámetros(3, "h", 'hola', [1,2,3], [1], "h");
        print_r($analisis);
    
    
    
    ?>
</body>
</html>