<?php
    spl_autoload_register(function($class) {
        $path = "./";
        $file = str_replace('\\', '/', $class);
        require("$path${file}.php");
    });
    use Formulario\claseBD;


    $formulario = Formulario\ControladorUsuario::singleton();
    @$formulario->crearCampos($_POST);

    
    if (isset($_POST["submit"])){
        if($formulario->esValido()){

            //Establecer conexión con la BBDD.
            $dsn = 'mysql:host=localhost;dbname=examen';
            $user = $passwd = "examen";
            $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
            $baseDeDatos = new claseBD($dsn, $user, $passwd,$options);

            //Guardar en la DB.
            $baseDeDatos->insertarValores($formulario);

            //Redirigir.
            header("Location: index.php?success=true");

            //Salir
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario de registro</title>
    <link rel="stylesheet" href="./CSS/index.css">
</head>
    <?php \Formulario\Campo::pintarFormulario() ?>
</body>
</html>
