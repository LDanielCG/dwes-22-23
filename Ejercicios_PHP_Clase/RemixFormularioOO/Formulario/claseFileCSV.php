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
                $form->getApellidos()->getDatos().",".
                $form->getNumero()->getDatos().",".
                password_hash($form->getContraseña()->getDatos(), PASSWORD_DEFAULT).",".
                $form->getFecha()->getDatos().",".
                $form->getCorreo()->getDatos().",".
                $form->getSexo()->getDatos().",".
                $form->getCurso()->getDatos().",".
                implode(";",$form->getEstudios()->getDatos()).",".
                $form->getDescripcion()->getDatos()."\n",
                FILE_APPEND
            );
        }
    }
?>