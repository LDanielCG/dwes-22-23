<?php
    namespace Formulario;
    class Usuario extends Controlador {
        //Propiedades del usuario.
        private $nombre;
        private $apellidos;
        private $numero;
        private $contraseña;

        //Constructor.
        public function __construct($post){
            $this->nombre       = @$post[parent::getKeys()[0]];
            $this->apellidos    = @$post[parent::getKeys()[1]];
            $this->numero       = @$post[parent::getKeys()[2]];
            $this->contraseña   = @$post[parent::getKeys()[3]];
        }


        /* ********************************************************* */
        /*                   ---- ATENCIÓN ----                      */
        /*                   PARA AÑADIR CAMPOS                      */
        /*  AÑADIR LAS PROPIEDADES AL CONSTRUCTOR, a validarUsuario  */
        /*                AÑADIR LOS GETTER Y SETTER                 */
        /*              Y AÑADIR EL CAMPO EN lista.php.              */
        /* ********************************************************* */


        //Validación especifica.
        public function validarUsuario(){
            foreach(Campo::getCampos() as $campo){
                $campo->validar();
            }

            $this->setNombre(Campo::getCampos()[0]->getDatos());
            $this->setApellidos(Campo::getCampos()[1]->getDatos());
            $this->setNumero(Campo::getCampos()[2]->getDatos());
            $this->setContraseña(Campo::getCampos()[3]->getDatos());

        }
        //Comprobacion si es válido.
        public function esValido(){
            return count(Campo::getErrores()) == 0;
        }



        //Getters.
        public function getNombre()     {   return $this->nombre;     }
        public function getApellidos()  {   return $this->apellidos;  }
        public function getNumero()     {   return $this->numero;     }
        public function getContraseña() {   return $this->contraseña; }


        //Setters.
        public function setNombre($nom)         {   $this->nombre = $nom;       }
        public function setApellidos($ape)      {   $this->apellidos = $ape;    }
        public function setNumero($num)         {   $this->numero = $num;       }
        public function setContraseña($contr)   {   $this->contraseña = $contr; }


    }
?>