<?php
    namespace Formulario;
    class ControladorUsuario {
        private static $instance;

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

        public static function singleton(){
            if(!isset(self::$instance)){
                self::$instance = @new ControladorUsuario();
            }
            return self::$instance;
        }


        //Creacion de los campos.
        public function crearCampos($post){
            //Campos                  Tipo_campo    | nombre        | datos_campo           | Placeholder & Opciones Radio,Select,Checkbox  | Regex     | MinLength     | MaxLength
            @$this->nombre       = new CampoTexto    ("Nombre"       , $post["Nombre"]       , "Nombre"                                      );
            @$this->apellidos    = new CampoTexto    ("Apellidos"    , $post["Apellidos"]    , "Apellidos"                                   );
            @$this->numero       = new CampoNumero   ("Numero"       , $post["Numero"]       , "Numero"                                      );
            @$this->contraseña   = new CampoPassword ("Contraseña"   , $post["Contraseña"]   , "Contraseña"                                  );
            @$this->fecha        = new CampoFecha    ("Fecha"        , $post["Fecha"]        );
            @$this->correo       = new CampoCorreo   ("Correo"       , $post["Correo"]       , "Correo"                                      );
            @$this->sexo         = new CampoRadio    ("Sexo"         , $post["Sexo"]         , "Hombre","Mujer","Otro"                       );
            @$this->curso        = new CampoSelect   ("Curso"        , $post["Curso"]        , "SMR","ASIR","DAW","DAM"                      );
            @$this->estudios     = new CampoCheckbox ("Estudios"     , $post["Estudios"]     , "Primaria","ESO","Bachillerato","CFGM","CFGS" );
            @$this->descripcion  = new CampoTextArea ("Descripcion"  , $post["Descripcion"]  , "Descripcion"                                 );
        }


        //Pintar formulario
        public function pintarFormulario(){ ?>
            <form action="index.php" method="post">
                <h2>Regstrar usuario</h2>
                <div>
                    <?php foreach($this as $campo){
                        $campo->pintarCampo();
                    } ?>
                </div>
                <input type="submit" value="Enviar" name="submit">
            </form>
        <?php }

        //Validacion del formulario.
        public function validarFormulario(){
            foreach($this as $campo){
                $campo->validar();
            }
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

        //Recuperar claves.
        public function getKeys(){
            $keys = [];

            foreach($this as $campo){
                $keys[] = $campo->getNombre();
            }
            return $keys;
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