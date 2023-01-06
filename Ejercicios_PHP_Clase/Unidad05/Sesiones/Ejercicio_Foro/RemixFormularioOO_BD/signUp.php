<?php
    session_start();
    require_once("./spl_autoload.php");
    require_once("./Formulario/claseBD.php");
    require_once("./DBConnection.php");

    //Crear formulario
    $formulario = Formulario\ControladorFormulario::singleton();
    @$formulario->crearCamposSignUp($_POST);

    if (isset($_POST["submit"])){
        if($formulario->esValidoLogin()){
            //Recupera el los datos del usuario con el email introducido.
            $select = $baseDeDatos->buscarPorMail($_POST['e-mail']);

            if($_POST["e-mail"] == $_POST["confirm_email"]){
                if($_POST["password"] == $_POST["confirm_password"]){
                    if(empty($select)){
                        //Crear el usuario.
                            $baseDeDatos->registrarUsuario($_POST);
                        //Redirigir al index.
                            header("Location: index.php?registro=success");
                        //Salir
                            exit();
                    }else{
                        \Formulario\Campo::addErrores("E-mail introducido ya existe.");
                    }
                }else{
                    \Formulario\Campo::addErrores("La contraseña tiene que coincidir.");
                }
            }else{
                \Formulario\Campo::addErrores("El e-mail tiene que coincidir.");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Foro - SignUp</title>
    <link rel="stylesheet" href="./Assets/CSS/login.css">
    <link rel="stylesheet" href="./Assets/CSS/header.css">
</head>
<body>
    <?php \Formulario\Campo::pintarFormularioSignUp() ?>
</body>
</html>