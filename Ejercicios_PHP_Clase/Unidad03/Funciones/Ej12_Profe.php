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
function formatFormUser(array $user)
{
    ?>
    <form action="" method="get">
        <?php
            // <input name='key' value='value' type='text|number' >
            array_walk($user, function($value, $key){
                $tipo = (is_int($value))?'number':'text';
                echo "$key: <input name='$key' value='$value' type='$tipo' ><br>";
            });
        ?>
    </form>
    <?php
}
    formatFormUser($yo);
?>









</body>
</html>