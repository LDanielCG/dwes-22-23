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
        function esPrimo($n){
            if ($n == 0 || $n == 1){
                return true;
            } else {
                $esprimo = true;
                $c = 2;
                while($esprimo && $c <= ($n/2)) {
                    if(($n % $c) == 0 ){
                        $esprimo = false;
                    }
                    $c++;
                }
                return $esprimo;
            }
        }

        do{
            $numero = mt_rand(0,100);

            if(!esPrimo($numero) && $numero != 17){
                echo "<span>".$numero."</span><br>";
            }

        }while(!esPrimo($numero) && $numero != 17);

    ?>
</body>
</html>