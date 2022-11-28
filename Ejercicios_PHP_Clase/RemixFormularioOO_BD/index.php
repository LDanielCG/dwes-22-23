<?php
    spl_autoload_register(function($class) {
        $path = "./";
        $file = str_replace('\\', '/', $class);
        require("$path${file}.php");
    });
    use Formulario\claseBD;


    $config = Formulario\Controlador::singleton();
    @$config->crearCampos($_POST);

    
    if (isset($_POST["submit"])){
        $usuario = new Formulario\Usuario($_POST);
        $usuario->validarUsuario();

        //Recuento de errores.
        if($usuario->esValido()){
            $dsn = 'mysql:host=localhost;dbname=examen';
            $user = $passwd = "examen";
            $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
            $baseDeDatos = new claseBD($dsn, $user, $passwd,$options);

            //Guardar en la DB.
            $baseDeDatos->insertarValores($usuario);

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
</head>
<style>
    form div{
        display: flex;
        flex-direction: column;
    }
    form div label{
        margin:10px;
    }
    textarea {
        width: 300px;
        height: 100px;
        resize: none;
    }
</style>
<body>
    <?php

        if(count(Formulario\Campo::getErrores()) > 0){
            foreach(Formulario\Campo::getErrores() as $error){
                echo "<p>$error</p>";
            }
        }else if(@$_GET["success"]){
            echo "<p>Se ha creado el usuario.</p>";
        }
    ?>

    <?php \Formulario\Campo::pintarFormulario() ?>
    <a href="lista.php">Ver usuarios</a>

</body>
</html>
