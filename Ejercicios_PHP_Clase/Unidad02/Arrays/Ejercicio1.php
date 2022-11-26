<!-- 

1 Jorge (Profe)
Funciones: array_walk, array_map, array_filter, array_reduce

$personas = [
    ["Jorge", 1],
    ["Bea", 0],
    ["Paco", 1],
    ["Amparo", 0],
];

Utiliza alguna de las funciones para generar un array de cadenas indicando el nombre de la persona y cómo tratarle con formalidad. Si el valor entero detrás del nombre es un 1 Hay que poner "Señor <nombre>", si es 0 hay que poner "Señora <nombre>"

$resultado = ["Señor Jorge", "Señora Bea", "Señor Paco", "Señora Amparo"];
-->

<?php
    $personas = [
        ["Jorge", 1],
        ["Bea", 0],
        ["Paco", 1],
        ["Amparo", 0],
    ];

    function modifPersonas($per){    
        if($per[1] == 1){
            return "Señor ".$per[0];
        }else{
            return "Señora ".$per[0];
        }
        
        //Con operador ternario
        //return $per[1] == 1 ? "Señor ".$per[0] : "Señora ".$per[0];
    }

    array_walk($personas,'modifPersonas');

    $conPrefijo = array_map('modifPersonas',$personas);

    print_r($conPrefijo);
    echo '<br><br><br>';
?>




<!--

$comida = [
     0 => ["Banana", 3, 56],
    1 => ["Chuleta", 1, 256],
    2 => ["Pan", 1, 90]
]
    
Utiliza la función array_reduce para calcular la cantidad 
de calorías de la comida anterior.

-->
<?php
    $comida = [
        0 => ["Banana", 3, 56],
        1 => ["Chuleta", 1, 256],
        2 => ["Pan", 1, 90]
    ];
    
    function producto($res,$comidas) {
        $res += $comidas[1]*$comidas[2];
        return $res;
    }


    $resultados = array_reduce($comida, "producto");
    print_r('Calorias totales: '.$resultados);
    echo '<br><br><br>';
?>


<!--
Con el array de personas anterior, utiliza el 
array_filter para sacar un listado de Hombre y otro listado de mujeres.
-->
<?php

    $personas = [
        ["Jorge", 1],
        ["Bea", 0],
        ["Paco", 1],
        ["Amparo", 0],
    ];

    function hombres($impares){
        return $impares[1] & 1;
    }
    function mujeres($pares){
        return !($pares[1] & 1);
    }

    echo "<br>Hombres:<br>";
    print_r(array_filter($personas, "hombres"));
    echo "<br>Mujeres:<br>";
    print_r(array_filter($personas, "mujeres"));
?>



