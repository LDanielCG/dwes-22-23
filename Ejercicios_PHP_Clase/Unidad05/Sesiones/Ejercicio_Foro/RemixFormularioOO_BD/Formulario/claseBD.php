<?php
    namespace Formulario;
    class claseBD {
        private static $instance;

        function __construct($dsn,$user,$pass,$options){
            if(!isset(self::$instance)){
                try{
                    self::$instance = new \PDO($dsn,$user,$pass,$options);

                } catch (\PDOException $e) {
                    print "¡Error!: " . $e->getMessage() . "\n";
                    die();
                }
            }
        }


        function insertarValores($user){
            $stmt = self::$instance->prepare("INSERT INTO usuarios (
                nombre, 
                apellidos, 
                numero, 
                contrasena, 
                fecha, 
                correo, 
                sexo, 
                curso, 
                estudios,
                descripcion
            ) VALUES (
                :nombre, 
                :apellidos, 
                :numero, 
                :contrasena, 
                :fecha, 
                :correo, 
                :sexo, 
                :curso, 
                :estudios,
                :descripcion
            )");

            $stmt->execute([
                ":nombre"       => $user->getNombre()->getDatos(),
                ":apellidos"    => $user->getApellidos()->getDatos(),
                ":numero"       => $user->getNumero()->getDatos(),
                ":contrasena"   => password_hash($user->getContraseña()->getDatos(), PASSWORD_DEFAULT),
                ":fecha"        => $user->getFecha()->getDatos(),
                ":correo"       => $user->getCorreo()->getDatos(),
                ":sexo"         => $user->getSexo()->getDatos(),
                ":curso"        => $user->getCurso()->getDatos(),
                ":estudios"     => implode(";", $user->getEstudios()->getDatos()),
                ":descripcion"  => $user->getDescripcion()->getDatos()
            ]);
        }

        function publicarMensaje($msg){
            $stmt = self::$instance->prepare("INSERT INTO mensajes_foro (
                id_user,
                fecha_hora,
                cuerpoMensaje
            ) VALUES (
                :id_user,
                :fecha_hora,
                :cuerpoMensaje
            )");

            $fecha = time();

            $stmt->execute([
                ":id_user"       => $msg->getId_user()->getDatos(),
                ":fecha_hora"    => $fecha,
                ":cuerpoMensaje" => $msg->getCuerpoMensaje()->getDatos()
            ]);
        }

        function publicarRespuesta($post){
            $stmt = self::$instance->prepare("INSERT INTO respuestas_foro (
                id_msg_r,
                id_user_r,
                id_user,
                fecha_hora,
                cuerpoRespuesta
            ) VALUES (
                :id_msg_r,
                :id_user_r,
                :id_user,
                :fecha_hora,
                :cuerpoRespuesta
            )");

            $fecha = time();

            $stmt->execute([
                ":id_msg_r"        => (int)$post->getId_msg_r()->getDatos(),
                ":id_user_r"       => (int)$post->getId_user_r()->getDatos(),
                ":id_user"         => (int)$post->getId_user()->getDatos(),
                ":fecha_hora"      => $fecha,
                ":cuerpoRespuesta" => $post->getCuerpoMensaje()->getDatos()
            ]);
        }

        function registrarUsuario($user){
            $stmt = self::$instance->prepare("INSERT INTO usuarios_foro (
                username, 
                correo, 
                contrasena
            ) VALUES (
                :username,
                :correo,
                :contrasena
            )");

            $stmt->execute([
                ":username"       => $user['username'],
                ":correo"         => $user['e-mail'],
                ":contrasena"     => password_hash($user['password'], PASSWORD_DEFAULT),
            ]);
        }

        function seleccionarTodo(){
            $stmt = self::$instance->prepare("SELECT * FROM usuarios");
            $stmt->execute();

            return $stmt->fetchAll();
        }

        function seleccionarMensajes(){
            $stmt = self::$instance->prepare
            ("SELECT username, 
                     fecha_hora, 
                     cuerpoMensaje, 
                     id_msg, 
                     mensajes_foro.id_user 
            FROM usuarios_foro, mensajes_foro WHERE usuarios_foro.id_user = mensajes_foro.id_user ORDER BY fecha_hora DESC;
            ");
            $stmt->execute();

            return $stmt->fetchAll();
        }

        function seleccionarMensaje($get){
            $stmt = self::$instance->prepare
            ("SELECT username, 
                     fecha_hora, 
                     cuerpoMensaje 
            FROM usuarios_foro, mensajes_foro 
            WHERE usuarios_foro.id_user = mensajes_foro.id_user 
            AND id_msg = :id_msg AND mensajes_foro.id_user = :id_user;
            ");

            $stmt->bindParam(':id_msg', $get['id_msg_r']);
            $stmt->bindParam(':id_user', $get['id_user_r']);

            $stmt->execute();

            return $stmt->fetch();
        }

        function seleccionarRespuestas($get){
            $stmt = self::$instance->prepare
            ("SELECT username, 
                     fecha_hora, 
                     cuerpoRespuesta, 
                     id_respuesta, 
                     respuestas_foro.id_user 
            FROM usuarios_foro, respuestas_foro 
            WHERE usuarios_foro.id_user = respuestas_foro.id_user 
            AND id_user_r = :id_user_r
            AND id_msg_r = :id_msg_r
            ORDER BY fecha_hora DESC;
            ");

            $stmt->bindParam(':id_user_r', $get['id_user_r']);
            $stmt->bindParam(':id_msg_r', $get['id_msg_r']);

            $stmt->execute();

            return $stmt->fetchAll();
        }




        function eliminarFilas($post){
            $stmt = self::$instance->prepare(
                sprintf("DELETE FROM usuarios WHERE id IN (%s)",
                implode(",", array_fill(0, count($post), "?")))
            );
            $stmt->execute($post);
        }
        
        function buscarPorNombre($post){
            $stmt = self::$instance->prepare
            ("SELECT id,
                    nombre,
                    apellidos,
                    numero,
                    fecha,
                    correo,
                    sexo,
                    curso,
                    estudios,
                    descripcion 
            FROM usuarios WHERE nombre LIKE :nombre");
     
            $nombre = "%".$post."%";
            $stmt->bindParam(':nombre', $nombre);

            $stmt->execute();
            return $stmt->fetchAll();
        }

        function buscarPorMail($post){
            $stmt = self::$instance->prepare
            ("SELECT * FROM usuarios_foro WHERE correo LIKE :correo");

            $email = $post;
            $stmt->bindParam(':correo', $email);

            $stmt->execute();
            return $stmt->fetch();
        }

        public static function getInstance(){return self::$instance;}
        
    }
?>