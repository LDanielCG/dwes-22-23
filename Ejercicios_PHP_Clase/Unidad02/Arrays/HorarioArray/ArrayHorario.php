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
$horas = array(0 => "Horas",1 => "16:00 - 16:55",2 => "16:55 - 17:50",3 => "17:50 - 18:45",4 => "18:45 - 19:10",5 => "19:10 - 20:05",6 => "20:05 - 21:00",7 => "21:00 - 21:55");
function imprimir_horario($horario,$horas) {
    echo '<table>';
    for($f = 0; $f < count($horario); $f++){
        echo '<tr>';
        echo '<td>'. $horas[$f] .'</td>';
        for($c = 1; $c <= count($horario[$f]); $c++){
            echo '<td class="'.$horario[$f][$c].'">'. $horario[$f][$c] . '</td>';
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
    <style>
        .DWEC {
            background-color: #ffe59e;
        }
        .EIE {
            background-color: #fff53d;
        }
        .ITGS {
            background-color: #3ddbff;
        }
        .DAW {
            background-color: #f8d4ff;
        }
        .DIW {
            background-color: #ffd4d4;
        }
        .DWES {
            background-color: #9592f7;
        }
        .Recreo {
            background-color: #8c8c8c;
        }
        td {
            padding:5px;
            text-align: center;
            border-left:1px solid black;
        }
        table {
            border: 2px solid black;
            border-collapse: collapse;
        }
    </style>
    </head>
    <body>

        
        <?php echo imprimir_horario($horario,$horas); ?>
       



    </body>
</html>