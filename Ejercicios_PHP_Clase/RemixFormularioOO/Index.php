<?php
    spl_autoload_register(function($class) {
        $path = "./";
        $file = str_replace('\\', '/', $class);
        require("$path${file}.php");
    });

    $config = \Formulario\Controlador::singleton();
    @$config->crearCampos($_POST);
   
    $claves = $config->getClaves();
    
    if (isset($_POST["submit"])){
        $usuario = new Formulario\Usuario($_POST);
        $usuario->validarUsuario();

        //Recuento de errores.
        if($usuario->esValido()){
            //Guardar en el archivo.
            $config->guardarUsuario($usuario);
            
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

    <form action="index.php" method="post">
        <h2>Regstrar usuario</h2>
        <div>
            <?php \Formulario\Campo::pintarFormulario() ?>
        </div>

        <input type="submit" value="Enviar" name="submit">
        <a href="lista.php">Ver usuarios</a>
    </form>


</body>
</html>
