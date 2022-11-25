<?php


    print_r($_POST);
    $array3enRaya = [];
    $fila;
    $columna;
    if(isset($_POST)){
            $fila = $_POST["filas"];
            $columna = $_POST["columnas"];
            array_push($array3enRaya,$columna);
    }
    

    
    print_r($array3enRaya);

    function printTable($arr){
        $TAMAÑO_TABLA = 3;
        echo "<table border>";
        for($fils = 0; $fils < $TAMAÑO_TABLA; $fils++){
            echo "<tr>";
            
            for($cols = 0; $cols < $TAMAÑO_TABLA; $cols++){
                echo "<br>Search: ".array_search($cols,$arr);
                echo "<br>Fila: ".$fils;
                echo "<td></td>";
               
            }
            
            echo "</tr>";
        }
        echo "</table>";
    }


    function imprimirTabla($fil,$col){
        $TAMAÑO_TABLA = 3;
        echo "<table border>";
        for($i = 1; $i <= $TAMAÑO_TABLA; $i++){
            if($i == $fil){
                echo "<tr>";
                for($j = 1; $j <= $TAMAÑO_TABLA; $j++){
                    if($j == $col){
                        echo "<td>".$_POST['turno']."</td>";
                    }else{
                        echo "<td></td>";
                    }
                }
                echo "</tr>";
            }else{
                echo "<tr>";
                for($j = 1; $j <= $TAMAÑO_TABLA; $j++){
                    echo "<td></td>";
                }
                echo "</tr>";
            }
        }
        echo "</table>";
    }

    //imprimirTabla($fila,$columna);

    printTable($array3enRaya);





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        * {
            margin:0;
            padding: 0;
        }
        table{
            width: 200px;
            height: 200px;
            text-align: center;
        }
        td {
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
    <br>
    <form action="" method="post">
        <label>Turno: </label>
        <select name="turno" >
            <option value="O">O</option>
            <option value="X">X</option>
        </select>
        <br>
        <label>Fila:    </label><input type="number" name="filas" value="<?=$fila?>"><br>
        <label>Columna: </label><input type="number" name="columnas" value="<?=$columna?>"><br>
        <button type="submit">Jugar</button>
    </form>
</body>
</html>