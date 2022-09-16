<?php
$cosa = "Hola soy PHP";
$cosa = 5;
?>
<html>
    <head>
        <title>Hola mundo de php</title>
    </head>
    <body>
        <?php 
            for($i=0; $i < $cosa; $i++) { 
                echo "<h1>Hola esto es un bucle " . $i . " de " . $cosa . "</h1>";
            }
        ?>
    </body>
</html>
