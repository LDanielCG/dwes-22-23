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

    function modifPersonas($per, $prefijo){
        echo "$prefijo $per";
    }

    foreach ($personas as $nom){
        foreach($nom as $num){
            if($num == 1){
                echo 'señor'.$nom . '<br>';
            }elseif($num == 0){
                echo 'señora'.$nom . '<br>';
            }
        }
    }
   //print_r($personas);





?>




<!--

$comida = [
     0 => ["Banana", 3, 56],
1 => ["Chuleta", 1, 256]
2 => ["Pan", 1, 90]
    ]
    
Utiliza la función map_reduce para calcular la cantidad de calorías de la comida anterior.

--

Con el array de personas anterior, utiliza el array_filter para sacar un listado de Hombre y otro listado de mujeres.

-->