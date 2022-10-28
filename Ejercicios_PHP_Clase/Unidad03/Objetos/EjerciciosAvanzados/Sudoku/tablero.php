<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
            border: 5px solid black;
        }
        td {
            border: 1px solid black;
            width: 50px;
            height: 50px;
            text-align: center;
        }
        td:nth-child(3),td:nth-child(6){
            border-right: 4px solid black;
        }
        tr:nth-child(3),tr:nth-child(6){
            border-bottom: 4px solid black;
        }
    </style>
    <?php
        $arrayCasillas = [
            "a" => [1],
            "b" => [],
            "c" => [],
            "d" => [],
            "e" => [],
            "f" => [],
            "g" => [],
            "h" => [],
            "i" => [] 
        ]; 
        echo "<table>";
        for($f = 0; $f < 9; $f++){
            echo "<tr>";
            $numCas=1;
            foreach($arrayCasillas as $fila => $columna){
                $numCas++;
                echo "<td class='$fila$numCas'></td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        function generarNumeros($arr){

            foreach($arr as $fila => $columna){
                array_push($columna,rand(1,9));
            }
    
        }

    ?>
</head>
<body>
</body>
</html>
