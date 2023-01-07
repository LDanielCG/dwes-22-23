<?php
    session_start();
    require_once("./spl_autoload.php");
    require_once("./getURL_SESSION.php");
    require_once("./DBConnection.php");

   
    $mensaje_main = $baseDeDatos->seleccionarMensaje($_GET);
    //Recuperar mensajes.
    $selectRespuestas = $baseDeDatos->seleccionarRespuestas($_GET);

    //Crear formulario
        $formulario = Formulario\ControladorFormulario::singleton();
        @$formulario->crearCamposRespuesta($_POST);

        if( isset($_GET['id_msg_r']) && isset($_GET['id_user_r']) ){
            $_SESSION['id_msg_r'] = $_GET['id_msg_r'];
            $_SESSION['id_user_r'] = $_GET['id_user_r'];
        }else if( isset($_POST['id_msg_r']) && isset($_POST['id_user_r']) ){
            $_SESSION['id_msg_r'] = $_POST['id_msg_r'];
            $_SESSION['id_user_r'] = $_POST['id_user_r'];
        }

        if (isset($_POST["submit"])){
            if($formulario->esValidoCuerpoMensaje()){
                //Guardar en la Base de Datos la publicación.
                    $baseDeDatos->publicarRespuesta($formulario);
                //Redirigir mostrando que se ha publicado correctamente.
                    $url = "detalle.php?id_msg_r=".$_SESSION['id_msg_r']."&id_user_r=".$_SESSION['id_user_r'];
                    header("Location: ".$url."&success=1");
                //Salir
                    exit();
            }
        }

        //print_r($_SESSION);


    function pintarMensajeMain($mensaje){ ?>
        <div class="mensaje-Cont">
            <div class="mensaje-userPic">
                <img src="./Assets/img/userPic.png" alt="userPic">
            </div>
            
            <div class="mensaje-cabecera-y-cuerpo">
                <div class="mensaje-cabecera">
                    <?php foreach($mensaje as $columna => $dato){ 
                        if($columna == "username") {
                            echo "<p class='mensaje-nombreUsuario'>$dato</p>";
                        }else if($columna == "fecha_hora"){
                            echo "<p class='mensaje-separador subtitulo'> · </p>";
                            echo "<p class='mensaje-fechaHora subtitulo'>".date("d/m/Y H:i",$dato)."</p>";
                        }
                    } ?>
                </div>
                <div class="mensaje-cuerpo">
                    <?php foreach($mensaje as $columna => $dato){ 
                        if($columna == "cuerpoMensaje") {
                            echo "<p>".$dato."</p>";
                        }
                    } ?>
                </div>
            </div>
        </div>
    <?php }
    
    function enviarMensaje() {
        if(isset($_SESSION['id_user'])){
            \Formulario\Campo::pintarFormularioRespuesta(); 
        }else{
            echo "<div class='login-alert-mensaje'>";
            echo "<p>Para realizar publicaciones, inicia sesión <a href='./login_v2.php'>aquí</a></p>";
            echo "</div>";
        }
    }

    
    //print_r($selectRespuestas);
    function pintarRespuestas($selectRespuestas){
        if(!empty($selectRespuestas)) {
            foreach ($selectRespuestas as $fila){ ?>
                <div class="mensaje-Cont respuesta">
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
                                }
                            } ?>
                        </div>
                        <div class="mensaje-cuerpo">
                            <?php foreach($fila as $columna => $dato){ 
                                if($columna == "cuerpoRespuesta") {
                                    echo "<p>".$dato."</p>";
                                }
                            } ?>
                        </div>
                    </div>
                </div>
            <?php }
        } else {
            echo "<h2>No hay publicaciones, ¿por qué no haces una?</h2>";
        }
    }






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalle - Mensaje</title>
    <link rel="stylesheet" href="./Assets/CSS/header.css">
    <link rel="stylesheet" href="./Assets/CSS/index.css">
</head>
<body>
    <?php require_once("./header.php") ?>

    <div class="mensajes-Cont">
        <?php pintarMensajeMain($mensaje_main) ?>
        <?php enviarMensaje() ?>
        <?php pintarRespuestas($selectRespuestas) ?>
    </div>
</body>
</html>