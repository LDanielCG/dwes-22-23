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

        function sum($n1,$n2){
            $acc = 0;
            for($i = $n1; $i < $n2; $i++){
                echo $i." -> ".$acc."<br>";
                $acc += $i;
            }
            return $acc+$n2;
        }

        echo "Resultado: ".sum(1, 5);
        //1, 2, 3, 4, 5 =  15

    ?>
</body>
</html>