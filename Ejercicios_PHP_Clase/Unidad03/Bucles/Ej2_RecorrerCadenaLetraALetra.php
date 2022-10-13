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
    
    $stringTexto = "Hola que tal";
    $cont=0;
    while($cont != strlen($stringTexto) && $stringTexto[$cont] != "a"){
        echo "<h4>".$stringTexto[$cont]."</h4>";
        $cont++;
    }

?>
</body>
</html>