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
    require_once("Coche.php"); 
    require_once("CocheConRemolque.php"); 
    require_once("CocheGrua.php");

    $coche1 = new Coche("1000","BMW",30);
    $coche2 = new CocheConRemolque("1001","Renault",30,200);
    $coche3 = new Coche("1002","Porche",40);    
    $cocheGrua = new CocheGrua("1003","Renault",20);

    $cocheGrua->cargar($coche3);
    $cocheGrua->cargar($coche1);
    $cocheGrua->cargar($coche2);
    $cocheGrua->cargar($cocheGrua);

    $cocheGrua->pintarInformacion();
    //echo "<br/><br/>";
    //$cocheGrua->descargar($coche1);
    //$cocheGrua->pintarInformacion();
?>

</body>
</html>