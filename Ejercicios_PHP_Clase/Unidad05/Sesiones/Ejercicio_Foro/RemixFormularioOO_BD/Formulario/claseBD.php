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

        function publicarMensaje($user){
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
                ":id_user"       => $user->getId_user()->getDatos(),
                ":fecha_hora"    => $fecha,
                ":cuerpoMensaje" => $user->getCuerpoMensaje()->getDatos()
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
                ":username"       => $user->getUsername()->getDatos(),
                ":correo"         => $user->getCorreo()->getDatos(),
                ":contrasena"     => password_hash($user->getContraseña()->getDatos(), PASSWORD_DEFAULT),
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