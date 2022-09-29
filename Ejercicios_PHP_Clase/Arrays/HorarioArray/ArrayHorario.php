<?php
$horario = array(
    0 => array(1 => 'Lunes',2 => 'Martes',3 => 'Miercoles',4 => 'Jueves',5 => 'Viernes'),
    1 => array(1 => "DWEC",2 => "ITGS",3 => "DIW",4 => "EIE",5 => "DWES"),
    2 => array(1 => "DWEC",2 => "DAW", 3 => "DIW", 4 => "DAW", 5 => "DWES"),
    3 => array(1 => "DWEC",2 => "DAW",3 => "DIW",4 => "DAW",5 => "DWES"),
    4 => array(1 => "Recreo",2 => "Recreo",3 => "Recreo",4 => "Recreo",5 => "Recreo"),
    5 => array(1 => "EIE",2 => "DIW",3 => "DWES",4 => "DWES",5 => "DWEC"),
    6 => array(1 => "EIE",2 => "DIW",3 => "DWES",4 => "DWES",5 => "DWEC"),
    7 => array(1 => "ITGS",2 => "DIW",3 => "DWES",4 => "DWES",5 => "DWEC")
);

function imprimir_horario($horario) {
    echo '<table border>';
    for($f = 1; $f <= count($horario); $f++){
        echo '<tr>';
        for($c = 1; $c <= count($horario[$f]); $c++){
            echo '<td>'. $horario[$f][$c] . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';

}

//echo sizeof($horario);
//echo $horario['lunes'][4];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style></style>
    </head>
    <body>

        
        <?php echo imprimir_horario($horario); ?>
       



    </body>
</html>