<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

    $tareas = [
        "limpiar",
        "fregar",
        "sacar basura",
        "comprar leche",
        "limpiar cristales",
        "comprar tabaco"
    ];
    $personas = [
        "Daniel",
        "Jason",
        "Mario",
        "Javier",
        "Miguel",
        "papa"
    ];

    
    foreach($tareas as $tar){
        $tareasAsignadas[$tar] = $personas[array_rand($personas, 1)];
    }
    foreach($tareasAsignadas as $tars => $noms){
        echo $tars." -> ".$noms."<br>";
        if($noms == "papa" && $tars == "comprar tabaco"){
            echo "vuelve por favor...😭​";
        }
    }

    //print_r($tareasAsignadas);

?>


</body>
</html>