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
    
        $n1 = mt_rand(1,10);
        $n2 = mt_rand(1,10);
        $n3 = mt_rand(1,10);
        echo $n1." ".$n2." ".$n3;

        if($n1 >= $n2 && $n1 >= $n3){
            $mayor = $n1;
            if($n2 >= $n3){
                $mediano = $n2;
                $menor = $n3;
            }else{
                $mediano = $n3;
                $menor = $n2;
            }
        }elseif($n2 >= $n1 && $n2 >= $n3){
            $mayor = $n2;
            if($n1 >= $n3){
                $mediano = $n1;
                $menor = $n3;
            }else{
                $mediano = $n3;
                $menor = $n1;
            }
        }elseif($n3 >= $n1 && $n3 >= $n2){
            $mayor = $n3;
            if($n1 >= $n2){
                $mediano = $n1;
                $menor = $n2;
            }else{
                $mediano = $n2;
                $menor = $n1;
            }
        }
        
        echo "<h1>".$mayor."</h1>";
        echo "<h2>".$mediano."</h2>";
        echo "<h3>".$menor."</h3>";
    ?>
</body>
</html>