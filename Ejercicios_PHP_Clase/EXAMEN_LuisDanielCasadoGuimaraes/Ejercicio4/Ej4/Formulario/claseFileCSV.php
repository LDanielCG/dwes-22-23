<?php
    namespace Formulario;

    class claseFileCSV {
        private static $instance;

        public static function singleton(){
            if(!isset(self::$instance)){
                self::$instance = new claseFileCSV();
            }
            return self::$instance;
        }

        public function getCSV(){
            return @file_get_contents("./CSV/usuarios.csv");
        }

        public function guardarUsuarioCSV($form){
            file_put_contents(
                "./CSV/usuarios.csv",
                $form->getNombre()->getDatos().",".
                $form->getDireccion()->getDatos().",".
                implode(";",$form->getExtras()->getDatos())."\n",
                FILE_APPEND
            );
        }
    }
?>