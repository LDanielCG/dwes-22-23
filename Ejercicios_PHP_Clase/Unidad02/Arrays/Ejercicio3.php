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

    $usuarios = [
        "jorge" => "1234",
        "amparo" => "admin",
        "mary" => "",
        "john" => ""
    ];



    //----------------------------------------------------------------
    //Apartado 1

    echo "<h2>Apartado 1</h2>";
    function apartado1($usr, $clave){
        echo "Usuario: " . $clave . " // Contraseña: " . $usr . "<br>";
    }
    array_walk($usuarios, 'apartado1');
    echo "<br><br>";



    //----------------------------------------------------------------
    //Apartado 2

    echo "<h2>Apartado 2</h2>";
    function apartado2($usr){
        $passHash = password_hash($usr, PASSWORD_DEFAULT);
        
        return $passHash;
    }
    $usuariosHash = array_map('apartado2', $usuarios);
    print_r($usuariosHash);
    echo "<br><br><br>";



    //----------------------------------------------------------------
    //Apartado 3

    echo "<h2>Apartado 3</h2>";
    function apartado3($clave, $valor){
        if ($clave == ""){
            $clave = "tmp2022";
        }
        echo "Usuario: " . $valor . " // Contraseña: " . $clave . "<br>";
    }
    array_walk($usuarios, 'apartado3');
    echo "<br><br>";


    
    //----------------------------------------------------------------    
    //Apartado 4

    echo "<h2>Apartado 4</h2>";
    
    //Conseguir el nombre de los usuarios sin contraseña:
    $sinPass = array_keys($usuarios, "");
    
    //Imprimir arrays antes del cambio
    echo "Usuarios sin contraseña: ";
    print_r($sinPass);
    
    echo "<br><br>";
    echo "<br><br>";
    
    echo "Usuarios sin modificar: ";
    print_r($usuarios);
    echo "<br><br>";

    //Bucle que recorre el array con los usuarios sin contraseña,
    for($i = 0; $i < sizeof($sinPass); $i++){
        $arrayconPass = array($sinPass[$i] => "tmp2022"); //les añade una contraseña por defecto,
        $usuarios = array_replace($usuarios, $arrayconPass); // y sobreescribe el array original.    
    }

    //Imprimir resultados
    echo "Usuarios modificados: ";
    print_r($usuarios);
    echo "<br><br>";

    foreach($usuarios as $usu => $contra){
            echo $usu . " // " . $contra . "<br>";
    }



?>


</body>
</html>