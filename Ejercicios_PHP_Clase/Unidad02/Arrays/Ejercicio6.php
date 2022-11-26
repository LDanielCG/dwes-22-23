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

    for($i = 0; $i < 20; $i++){
        $arrayRand[] = rand(1,30);
    }
    echo "Array generado random: <br><br>";
    print_r($arrayRand);
    echo "<br><br><br>";

    echo "Array ordenado: <br><br>";

    sort($arrayRand);
    print_r($arrayRand);
    echo "<br><br><br>";

    echo "Array primera mitad: <br><br>";
    $mitad = array_slice($arrayRand, 0, (sizeof($arrayRand)/2));
    print_r($mitad);
    echo "<br><br><br>";

    echo "Array sin la primera mitad: <br><br>";
    $arrayRand = array_slice($arrayRand,(sizeof($arrayRand)/2), sizeof($arrayRand));
    print_r($arrayRand);
    echo "<br><br><br>";

    echo "Array con la primera mitad al final: <br><br>";
    for($i = 0; $i < sizeof($arrayRand)/2; $i++){
        array_push($arrayRand, $mitad[$i]);
    }
    print_r($arrayRand);
    echo "<br><br><br>";

?>

</body>
</html>