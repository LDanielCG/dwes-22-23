<?php


    function pintaCabecera(...$cadenas){
        $cabecera = "<tr>";
        foreach($cadenas as $cadena){
            $cabecera .= "<th>".$cadena."</th>";
        }
        $cabecera .= "</tr>";
        return $cabecera;
    }

    function pintaContenido(...$cadenas){
        $contenido = "";
        foreach($cadenas as $cadena){
            foreach($cadena as $valor){
                $contenido .= "<tr rowspan><td>".$valor."</td></tr>";
            }
        }
        return $contenido;
    }

    
    function pintaHorarioVacio($horaMin, $horaMax){
        $horas = [];

        $diffHoras = $horaMax - $horaMin;
        for($i = 0; $i <= $diffHoras; $i++){
            $horas[] = $horaMin.":00";
            $horaMin++;
        }
        print_r($horas);

        $horario = [];
        $horario["dias"] = pintaCabecera("Lunes","Martes","Miercoles","Jueves","Viernes");
        $horario["horas"] = pintaContenido($horas);

        echo "<br><br>";
        print_r($horario);

        
    }
    
    function pintaHorizontal($head){
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1</title>
</head>
<body>
    <table border>
<?php
    pintaHorarioVacio(9,22);
?>
    </table>
</body>
</html>