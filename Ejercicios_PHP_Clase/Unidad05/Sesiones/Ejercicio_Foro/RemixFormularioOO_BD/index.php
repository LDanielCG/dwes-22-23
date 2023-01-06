<?php
    session_start();
    spl_autoload_register(function($class) {
        $path = "./";
        $file = str_replace('\\', '/', $class);
        require("$path${file}.php");
    });
    use Formulario\claseBD;

    




    $formulario = Formulario\ControladorFormulario::singleton();
    @$formulario->crearCamposPublicacion($_POST);

    if (isset($_POST["submit"])){
        if($formulario->esValidoCuerpoMensaje()){

            try{
                //Establecer conexión con la BBDD.
                $dsn = 'mysql:host=localhost;dbname=basededatosclase';
                $user = $passwd = "alumno";
                $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
                $baseDeDatos = new claseBD($dsn, $user, $passwd,$options);
            } catch (PDOException $e) {
                print "¡Error!: " . $e->getMessage() . "\n";
                die();
            }

            //Recuperar mensajes.
            $selectMensajes = $baseDeDatos->seleccionarMensajes();
            //Guardar en la DB.
            $baseDeDatos->publicarMensaje($formulario);

            //Redirigir.
            header("Location: index.php?success=true");

            //Salir
            exit();
        }
    }






?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio Foro</title>
    <link rel="stylesheet" href="./CSS/index.css">
</head>
<body>
    

<?php print_r($_SESSION)?>

<div class="mensajes-Cont">
    <?php \Formulario\Campo::pintarFormularioMensaje() ?>



<!--
    <div class="escribir-mensaje-Cont">
        <textarea class="escribir-mensaje-cuerpo" placeholder="¿Qué está pasando?"></textarea>
        <input type="submit" value="Enviar" name="submit" class="escribir-mensaje-Enviar">
    </div>
-->

    <div class="mensaje-Cont">
        <div class="mensaje-userPic">
            <img src="./Assets/img/userPic.png" alt="userPic">
        </div>
        <div class="mensaje-cabecera-y-cuerpo">
            <div class="mensaje-cabecera">
                <p class="mensaje-nombreUsuario">Nombre de Usuario</p>
                <p class="mensaje-separador subtitulo"> · </p>
                <p class="mensaje-fechaHora subtitulo">1/1/2023 16:42</p>
                <p class="mensaje-separador subtitulo"> · </p>
                <p class="mensaje-categoriaTema">Series de TV</p>
            </div>
            <div class="mensaje-cuerpo">
                <p>Hola esto es el cuerpo del mensaje de la publicacion.</p>
            </div>
        </div>
    </div>


        <?php foreach ($selectMensajes as $fila){ ?>
            <div class="mensaje-Cont">
                <div class="mensaje-userPic">
                    <img src="./Assets/img/userPic.png" alt="userPic">
                </div>
                <div class="mensaje-cabecera">
                    <?php foreach($fila as $columna => $dato){ 
                        if($columna == "username") {
                            echo "<p class='mensaje-nombreUsuario'>$dato</p>";
                        }else if($columna == "fecha_hora"){
                            echo "<p class='mensaje-separador subtitulo'> · </p>";
                            echo "<p class='mensaje-fechaHora subtitulo'>".date("d/m/Y H:i",$dato)."</p>";
                            echo "<p class='mensaje-separador subtitulo'> · </p>";
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
        <?php } ?>

</div>

</body>
</html>