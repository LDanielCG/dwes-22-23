<?php
    session_start();
    require_once("./spl_autoload.php");
    require_once("./DBConnection.php");

    //Recuperar mensajes.
        $selectMensajes = $baseDeDatos->seleccionarMensajes();
    //Crear formulario
        $formulario = Formulario\ControladorFormulario::singleton();
        @$formulario->crearCamposPublicacion($_POST);

    if (isset($_POST["submit"])){
        if($formulario->esValidoCuerpoMensaje()){
            //Guardar en la Base de Datos la publicación.
                $baseDeDatos->publicarMensaje($formulario);
            //Redirigir mostrando que se ha publicado correctamente.
                header("Location: index.php?success=true");
            //Salir
                exit();
        }
    }


    function enviarMensaje() {
        if(isset($_SESSION['id_user'])){
            \Formulario\Campo::pintarFormularioMensaje(); 
        }else{
            echo "<div class='login-alert-mensaje'>";
            echo "<p>Para realizar publicaciones inicia sesión: <a href='./login_v2.php'>Iniciar sesión</a></p>";
            echo "</div>";
        }
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Foro - Index</title>
    <link rel="stylesheet" href="./Assets/CSS/index.css">
    <link rel="stylesheet" href="./Assets/CSS/header.css">
</head>
<body>
    <?php require_once("./header.php") ?>
    
    <?php print_r($_SESSION)?>










    <div class="mensajes-Cont">

        <?php enviarMensaje() ?>



        <?php foreach ($selectMensajes as $fila){ ?>
            <div class="mensaje-Cont">
                <div class="mensaje-userPic">
                    <img src="./Assets/img/userPic.png" alt="userPic">
                </div>
                <div class="mensaje-cabecera-y-cuerpo">
                    <div class="mensaje-cabecera">
                        <?php foreach($fila as $columna => $dato){ 
                            if($columna == "username") {
                                echo "<p class='mensaje-nombreUsuario'>$dato</p>";
                            }else if($columna == "fecha_hora"){
                                echo "<p class='mensaje-separador subtitulo'> · </p>";
                                echo "<p class='mensaje-fechaHora subtitulo'>".date("d/m/Y H:i",$dato)."</p>";
                                echo "<p class='mensaje-separador subtitulo'> · </p>";
                                echo "<a class='mensaje-detalle subtitulo' href='./detalle.php?id_msg=".$fila['id_msg']."&id_user=".$fila['id_user']."'>Ver detalle</a>";
                            }
                        } ?>
                    </div>
                    <div class="mensaje-cuerpo">
                        <?php foreach($fila as $columna => $dato){ 
                            if($columna == "cuerpoMensaje") {
                                echo "<p>".$dato."</p>";
                            }
                        } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>