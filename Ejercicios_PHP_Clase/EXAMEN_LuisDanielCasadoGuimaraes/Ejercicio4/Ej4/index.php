<?php
    spl_autoload_register(function($class) {
        $path = "./";
        $file = str_replace('\\', '/', $class);
        require("$path${file}.php");
    });

    
    $formulario = Formulario\ControladorUsuario::singleton();
    @$formulario->crearCampos($_POST);
   
    
    if (isset($_POST["submit"])){
        if($formulario->esValido()){
            //Guardar en el archivo CSV.
            $fh = Formulario\claseFileCSV::singleton();
            $fh->guardarUsuarioCSV($formulario);
            
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
<body>
    <?php \Formulario\Campo::pintarFormulario() ?>
</body>
</html>
