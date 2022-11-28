<?php
    namespace Formulario;
    class Usuario extends Controlador {
        //Propiedades del usuario.
        private $nombre;        //CampoTexto
        private $apellidos;     //CampoTexto
        private $numero;        //CampoNumero
        private $contraseña;    //CampoPassword
        private $fecha;         //CampoFecha
        private $correo;        //CampoCorreo
        private $sexo;          //CampoRadio
        private $curso;         //CampoSelect
        private $estudios;      //CampoCheckbox
        private $descripcion;   //CampoTextArea

        //Constructor.
        public function __construct($post){
            $this->nombre       = @$post[parent::getKeys()[0]];
            $this->apellidos    = @$post[parent::getKeys()[1]];
            $this->numero       = @$post[parent::getKeys()[2]];
            $this->contraseña   = @$post[parent::getKeys()[3]];
            $this->fecha        = @$post[parent::getKeys()[4]];
            $this->correo       = @$post[parent::getKeys()[5]];
            $this->sexo         = @$post[parent::getKeys()[6]];
            $this->curso        = @$post[parent::getKeys()[7]];
            $this->estudios     = @$post[parent::getKeys()[8]];
            $this->descripcion  = @$post[parent::getKeys()[9]];

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
            
            $this->setNombre        (   Campo::getCampos()[0]->getDatos()   );
            $this->setApellidos     (   Campo::getCampos()[1]->getDatos()   );
            $this->setNumero        (   Campo::getCampos()[2]->getDatos()   );
            $this->setContraseña    (   Campo::getCampos()[3]->getDatos()   );
            $this->setFecha         (   Campo::getCampos()[4]->getDatos()   );
            $this->setCorreo        (   Campo::getCampos()[5]->getDatos()   );
            $this->setSexo          (   Campo::getCampos()[6]->getDatos()   );
            $this->setCurso         (   Campo::getCampos()[7]->getDatos()   );
            $this->setEstudios      (   Campo::getCampos()[8]->getDatos()   );
            $this->setDescripcion   (   Campo::getCampos()[9]->getDatos()   );


        }
        //Comprobacion si es válido.
        public function esValido(){
            return count(Campo::getErrores()) == 0;
        }



        //Getters.
        public function getNombre()      {   return $this->nombre;      }
        public function getApellidos()   {   return $this->apellidos;   }
        public function getNumero()      {   return $this->numero;      }
        public function getContraseña()  {   return $this->contraseña;  }
        public function getFecha()       {   return $this->fecha;       }
        public function getCorreo()      {   return $this->correo;      }
        public function getSexo()        {   return $this->sexo;        }
        public function getCurso()       {   return $this->curso;       }
        public function getEstudios()    {   return $this->estudios;    }
        public function getDescripcion() {   return $this->descripcion; }

        //Setters.
        public function setNombre($nom)         {   $this->nombre       = $nom;     }
        public function setApellidos($ape)      {   $this->apellidos    = $ape;     }
        public function setNumero($num)         {   $this->numero       = $num;     }
        public function setContraseña($contr)   {   $this->contraseña   = $contr;   }
        public function setFecha($fec)          {   $this->fecha        = $fec;     }
        public function setCorreo($corr)        {   $this->correo       = $corr;    }
        public function setSexo($sex)           {   $this->sexo         = $sex;     }
        public function setCurso($cur)          {   $this->curso        = $cur;     }
        public function setEstudios($est)       {   $this->estudios     = $est;     }
        public function setDescripcion($desc)   {   $this->descripcion  = $desc;    }

        
    }
?>