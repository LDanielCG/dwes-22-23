<?php
$num = 7;
$hasta = 14;
?>
<html>
    <head>
        <title>Hola mundo de php</title>
    </head>
    <body>
       <table border width="200px">
       	<tr>
       		<th colspan="2">Tabla del <?php echo $num ?></th>		
       	</tr>
       	<tr>
       		<td align="center">
       		    <?php 
                    for($i=0; $i <= $hasta; $i++) { 
                        echo "<h3>" . $num . " * " . $i . "</h3>";
                    }
                ?>
       		</td>
       		<td align="center">
       		    <?php 
                    for($i=0; $i <= $hasta; $i++) { 
                        echo "<h3>" . $num*$i . "</h3>";
                    }
                ?>
       		</td>
       	</tr>
       </table>
    </body>
</html>
