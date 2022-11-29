<?php


    $tablero = [];

    function inicializaSopaLetras($tablero, $n, $m){
        for($filas=0; $filas < $n; $filas++) {
            for($columnas=0; $columnas < $m; $columnas++) {
                $tablero[$filas][$columnas] = chr(rand(ord("a"),ord("z")));
            }
        }
        return $tablero;
    }

    function pintaTablero($tablero){
        echo "<table border width='200px'>";
            foreach($tablero as $filas){
                echo "<tr>";
                    foreach($filas as $columnas){
                        echo "<td>".$columnas."</td>";
                    }
                echo "</tr>";
            }
        echo "</table>";
    }

    function colocaPalabraHorizontal($tablero, $palabra){
        $rand_pos_fila = rand(0, (count($tablero))-1);
        $rand_pos_col = rand(0, (count($tablero[0]))-1);
        $palabraArr = str_split($palabra);

        print_r($tablero);
        echo "<br><br><br>";
        print_r($palabraArr);
        echo "<br>$rand_pos_col<br>";
        

        for($filas=0; $filas < count($tablero); $filas++) {
            if($filas == $rand_pos_fila){
                for($columnas=0; $columnas < count($tablero[$filas]); $columnas++) {


                    if($columnas >= $rand_pos_col){
                        $tablero[$filas][$columnas] = $palabraArr[$columnas-$rand_pos_col];
                        if($tablero[$filas][$columnas] == NULL){
                            $tablero[$filas][$columnas] = chr(rand(ord("a"),ord("z")));
                        }
                    }
                    /*
                    //Palabra cabe en la fila
                    if(strlen($palabra) < count($tablero[$filas])){

                        //Inserta la palabra al inicio de la fila
                        $tablero[$filas][$columnas] = $palabraArr[$columnas];

                        //Si el tamaño de la palabra es menor al de la fila inserta un caracter para rellenarla.
                        if($palabra[$columnas] == NULL){
                            $tablero[$filas][$columnas] = chr(rand(ord("a"),ord("z")));
                        }

                    }else{
                        //Algo
                    }*/
                }
            }
        }
        return $tablero;
    }



?>


<html>
<head>
    <title>Sopa de letras</title>
</head>
<body>
    <?php 
        $tablero = inicializaSopaLetras($tablero, 5, 5);

        $tablero = colocaPalabraHorizontal($tablero, "HOLA");
        pintaTablero($tablero); 
    ?>
</body>
</html>
