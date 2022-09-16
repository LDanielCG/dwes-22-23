<?php
 $num = 0;
 $cont = 0;
?>
<html>
     <head>
         <title>Hola mundo de php</title>
     </head>
     <body>
        <table border width="200px">
        <?php for($i=0; $i < 10; $i++) {
            echo "<tr>";
            for($j=0; $j < 10; $j++) {
                for($k = 1; $k <= $num; $k++){
                    if($num > 1 && $num % $k ==0){
                        $cont++;
                    }
                }
                if($cont==2){
                    echo "<td><b>" . $num . "</b></td>";
                } else{
                    echo "<td>" . $num . "</td>";
                }
                $cont=0;
                $num++;
            }
            echo "</tr>";
        } ?>
        </table>
     </body>
</html>