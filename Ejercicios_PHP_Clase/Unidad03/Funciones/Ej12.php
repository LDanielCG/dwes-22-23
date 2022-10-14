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
        $yo = [
            "nombre" => "Jorge Dueñas Lerín",
            "dirección" => "Calle falsa número 1234",
            "teléfono" => "91 123 45 67",
            "población" => "Madrid",
            "edad" => 23
        ];

        function funcionFormulario($info, $key){
            echo ucfirst($key).': <input name="'.$key.'" value="'.$info.'"></input><br>';
        }
    ?>

    <form id="datos personales" action="post">
        <?php array_walk($yo,'funcionFormulario'); ?>
    </form>
    
</body>
</html>