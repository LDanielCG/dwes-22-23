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

        for($i = 0; $i < strlen($stringTexto); $i++){
            echo "<h4>".$stringTexto[$i]."</h4>";
        }
    
    ?>
</body>
</html>