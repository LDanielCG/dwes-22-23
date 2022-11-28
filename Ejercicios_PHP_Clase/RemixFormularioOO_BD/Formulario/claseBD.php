<?php
    namespace Formulario;
    class claseBD {
        private static $instance;

        function __construct($dsn,$user,$pass,$options){
            if(!isset(self::$instance)){
                try{
                    self::$instance = new \PDO($dsn,$user,$pass,$options);

                } catch (PDOException $e) {
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


        function seleccionarTodo(){
            $stmt = self::$instance->prepare("SELECT * FROM usuarios");
            $stmt->execute();

            return $stmt->fetchAll();
        }

        function seleccionarTodoSinContrasena(){
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
            FROM usuarios");
            $stmt->execute();

            return $stmt->fetchAll();
        }

        public static function getInstance(){return self::$instance;}
        
    }
?>