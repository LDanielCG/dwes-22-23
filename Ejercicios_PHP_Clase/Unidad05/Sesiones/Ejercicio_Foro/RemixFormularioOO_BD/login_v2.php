<?php
    session_start();
    require_once("./spl_autoload.php");
    require_once("./Formulario/claseBD.php");
    require_once("./DBConnection.php");

    //Crear formulario
    $formulario = Formulario\ControladorFormulario::singleton();
    @$formulario->crearCamposLogin($_POST);

    if (isset($_POST["submit"])){
        if($formulario->esValidoLogin()){
            //Recupera el los datos del usuario con el email introducido.
            $select = $baseDeDatos->buscarPorMail($_POST['login']);

            print_r($select);
            if($select['correo'] == $_POST['login'] && password_verify($_POST['password'], $select['contrasena'])){
                $_SESSION['id_user'] = $select['id_user'];
                $_SESSION['username'] = $select['username'];
                //Redirigir al index.
                    header("Location: index.php");
                //Salir
                    exit();
            }else{
                \Formulario\Campo::addErrores("Contraseña incorrecta.");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Foro - Login</title>
    <link rel="stylesheet" href="./Assets/CSS/login.css">
    <link rel="stylesheet" href="./Assets/CSS/header.css">
</head>
<body>
    <?php \Formulario\Campo::pintarFormularioLogin() ?>
</body>
</html>