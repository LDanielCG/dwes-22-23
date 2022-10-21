<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php error_reporting(0);

$cosas = [
    3,
    "frutas"  => ["a" => "naranja", "b" => [1, 2 => ["test1","test2"]], "c" => "manzana"],
    "números" => [1, 2, 3, 4, 5, 6],
    "hoyos"   => ["primero", 5 => "segundo", "tercero"],
    "asd"
];


function imprimeTabulado($arr){
    foreach($arr as $value){
        echo "$value<br/>";
        foreach($value as $v_value){
            echo "____$v_value<br/>";
            foreach($v_value as $vv_value){
                echo "________$vv_value<br/>";
            }
        }
    }
}
function imprimeTabulado2($arr, $tab = ""){
    foreach($arr as $key => $value){
        echo $tab.$value."<br/>";
        if(is_array($value)){
            echo "".""."";
            $tab .= "____";
            imprimeTabulado2($value,$tab);
        }
    }
}
/*function imprimeTabulado2($cosas, $tab = 0) {
    $aux = '';
    for($i = 0; $i < $tab; $i++) $aux .= '_';

    foreach ($cosas as $key => $value) {
        if (is_array($value)) {
            echo $aux.gettype($value)."<br>";
            imprimeTabulado($value, ($tab + 4));
        } else {
            echo  $aux.$value."<br>";
        }
    }
}*/

//imprimeTabulado($cosas);
imprimeTabulado2($cosas);
?>



</body>
</html>