<?php
    class controlador {
        private static $instance;


        public static function singleton() {
            if(!isset(self::$instance)) {
                self::$instance = new controlador();
            }
            return self::$instance;
        }


        public function saveStudent(usuario $usuario) {
            file_put_contents(
                "./lista.csv",
                $usuario->getNombre().",".
                password_hash($usuario->getPassword(), PASSWORD_DEFAULT)."\n",
                FILE_APPEND
            );
        }
    }
?>