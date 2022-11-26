<?php

    $tabl[] = [];
    function inicializaSopaLetras($tablero, $n, $m){
        for($i = 0; $i < $n; $i++){
            for($j = 0; $j < $m; $j++){
                $tablero[$i][$j] = chr(rand(ord("a"),ord("z")));
            }
        }
        return $tablero;
    }
    $tabl = inicializaSopaLetras($tabl,2,6);
    print_r($tabl);


    function pintaTablero($tablero){
        echo "<table border>";
        for($i = 0; $i < count($tablero); $i++){
            echo "<tr>";
            foreach($tablero[$i] as $key => $value){
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    pintaTablero($tabl);

?>