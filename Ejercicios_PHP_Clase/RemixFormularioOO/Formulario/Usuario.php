<?php
    namespace Formulario;
    use \Formulario;
    class Usuario extends Controlador {
        private $nombre;

        public function __construct($post) {
            $this->nombre = $post[parent::getClaves()[0]];
        }


        public function validarUsuario(){
            foreach(Campo::getCampos() as $campo){
                $campo->validar();
            }

            $this->setNombre(Campo::getCampos()[0]->getDatos());
        }

        public function esValido(){
            return count(Campo::getErrores()) == 0;
        }




        //Getters.
        public function getNombre(){return $this->nombre;}

        //Setters.
        public function setNombre($nom){$this->nombre = $nom;}
    }
?>