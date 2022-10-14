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
    
    $opciones = [
        "Madrid" => 28,
        "Sevilla" => 17,
        "Cáceres" => 56
    ];
    
    function generar_select(array $opciones, int $seleccionada = -1){
        foreach($opciones as $key => $value){
            if($seleccionada == $value){
                echo '<option value="'.$key.'" selected>'.$key.'</option>';
            }else{
                echo '<option value="'.$key.'">'.$key.'</option>';
            }
        }
    }
    
    
    
    ?>

    <select name="provincias" id="provincias">
        <?php generar_select($opciones,56)?>
    </select>


</body>
</html>