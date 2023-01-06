<?php
    namespace Formulario;
    class ControladorFormulario {
        private static $instance;

        //Propiedades del usuario.
        private $id_user;        //CampoHidden
        private $fecha_hora;     //CampoNumero
        private $tema;          //CampoTexto
        private $contraseña;    //CampoPassword
        private $fecha;         //CampoFecha
        private $correo;        //CampoCorreo

        private $cuerpoMensaje;   //CampoTextArea

        public static function singleton(){
            if(!isset(self::$instance)){
                self::$instance = @new ControladorFormulario();
            }
            return self::$instance;
        }


        //Creacion de los campos.

        public function crearCampos($post){
            //Campos                  Tipo_campo    | nombre        | datos_campo           | Placeholder & Opciones Radio,Select,Checkbox  | Regex     | MinLength     | MaxLength
            $this->nombre       = new CampoTexto    ("Nombre"       , $post["Nombre"]       , "Tu nombre."                                   );
            $this->apellidos    = new CampoTexto    ("Apellidos"    , $post["Apellidos"]    , "Tus apellidos."                               );
            $this->numero       = new CampoNumero   ("Numero"       , $post["Numero"]       , "Tu número."                                   );
            $this->contraseña   = new CampoPassword ("Contraseña"   , $post["Contraseña"]   , "Tu contraseña."                               );
            $this->fecha        = new CampoFecha    ("Fecha"        , $post["Fecha"]        );
            $this->correo       = new CampoCorreo   ("Correo"       , $post["Correo"]       , "ejemplo@correo.es"                            );
            $this->sexo         = new CampoRadio    ("Sexo"         , $post["Sexo"]         , "Hombre","Mujer","Otro"                        );
            $this->curso        = new CampoSelect   ("Curso"        , $post["Curso"]        , "SMR","ASIR","DAW","DAM"                       );
            $this->estudios     = new CampoCheckbox ("Estudios"     , $post["Estudios"]     , "Primaria","ESO","Bachillerato","CFGM","CFGS"  );
            $this->descripcion  = new CampoTextArea ("Descripcion"  , $post["Descripcion"]  , "Tu descripción."                              );
        }

        public function crearCamposPublicacion($post){
            //Campos                  Tipo_campo      | nombre          | datos_campo             | Placeholder             | MaxLength
            $this->id_user        = new CampoHidden   ("id_user"        , $post['id_user']);
            //$this->fecha_hora     = new CampoNumero   ("fechaHora"      , $post['fechaHora']);
            //$this->tema           = new CampoTexto    ("tema"           , $post['tema']);
            $this->cuerpoMensaje  = new CampoTextArea ("CuerpoMensaje"  , $post["CuerpoMensaje"]  , "¿Qué está pasando?"    , 128);
        }









        //Validacion del formulario.
        public function validarFormulario(){
            foreach($this as $campo){
                $campo->validar();
            }
        }

        public function validarCuerpoMensaje(){
            $this->cuerpoMensaje->validar();
        }

        //Validación de errores.
        public function esValido(){
            self::validarFormulario();

            foreach($this as $campo){
                if(!empty($campo->getErrores())){
                    return false;
                }else{
                    return true;
                }
            }
        }
        public function esValidoCuerpoMensaje(){
            self::validarCuerpoMensaje();

            if(!empty($this->cuerpoMensaje->getErrores())){
                return false;
            }else{
                return true;
            }
        }

        //Recuperar claves.
        public function getKeys(){
            $keys = [];

            foreach($this as $campo){
                $keys[] = $campo->getNombre();
            }
            return $keys;
        }

        //Getters.
        public function getId_user()       {   return $this->id_user;       }
        public function getFecha_hora()    {   return $this->fecha_hora;    }
        public function getTema()          {   return $this->tema;          }
        public function getContraseña()    {   return $this->contraseña;    }
        public function getFecha()         {   return $this->fecha;         }
        public function getCorreo()        {   return $this->correo;        }

        public function getCuerpoMensaje() {   return $this->cuerpoMensaje; }

        //Setters.
        public function setId_user($nom)            {   $this->id_user     = $nom;     }
        public function setFecha_hora($dat)         {   $this->fecha_hora    = $dat;     }
        public function setTema($tem)               {   $this->tema       = $tem;     }
        public function setContraseña($contr)       {   $this->contraseña   = $contr;   }
        public function setFecha($fec)              {   $this->fecha        = $fec;     }
        public function setCorreo($corr)            {   $this->correo       = $corr;    }

        public function setCuerpoMensaje($cuerp)    {   $this->cuerpoMensaje  = $cuerp; }


    }
?>