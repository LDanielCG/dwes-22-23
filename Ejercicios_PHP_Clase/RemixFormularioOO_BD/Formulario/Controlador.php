<?php
    namespace Formulario;
    class Controlador {
        private static $instance;
        private static $fichero = [];
        private static $claves = [];
        protected static $keys;

        //Singleton.
        public static function singleton(){
            if(!isset(self::$instance)){
                self::$instance = new Controlador();
            }
            return self::$instance;
        }



        //Recuperar del archivo el usuario.
        public function recuperarUsuarios(){
            $usuarios = @file_get_contents("./CSV/listado.csv");

            self::$keys = @file_get_contents("./CSV/claves.csv");
            self::$keys = explode(',',self::$keys);

            if($usuarios != false){
                //Si existe el archivo.
                $usuarios = explode("\n", $usuarios);
                array_pop($usuarios);

                foreach($usuarios as $usuario){
                    $usuario = array_combine(self::$keys, explode(",", $usuario));
                    self::$fichero[] = new Usuario($usuario);
                }
            }else{
                //No existe el archivo, lo crea.
                self::$fichero = file_put_contents("./CSV/listado.csv", "");
            }

            return self::$fichero;
        }

        /* ********************************************************* */
        /*                   ---- ATENCIÓN ----                      */
        /*  PARA AÑADIR CAMPOS EDITAR guardarUsuario Y crearCampos.  */
        /*                TAMBIEN AÑADIRLOS A Usuario.               */
        /* ********************************************************* */

        //Guardar en un archivo el usuario.
        public function guardarUsuario(Usuario $usuario){
            file_put_contents(
                "./CSV/listado.csv",
                $usuario->getNombre().",".
                $usuario->getApellidos().",".
                $usuario->getNumero().",".
                password_hash($usuario->getContraseña(), PASSWORD_DEFAULT).",".
                $usuario->getFecha().",".
                $usuario->getCorreo().",".
                $usuario->getSexo().",".
                $usuario->getCurso().",".
                implode(";",$usuario->getEstudios()).",".
                $usuario->getDescripcion()."\n",
                FILE_APPEND
            );
        }

        //Creacion de los campos.
        public function crearCampos($post){
            //Campos          tipo_campo    | nombre        | datos_campo           | Placeholder                                   | Regex     | MinLength     | MaxLength
            $nombre     = new CampoTexto    ("Nombre"       , $post["Nombre"]       , "Nombre"                                      );
            $apellido   = new CampoTexto    ("Apellidos"    , $post["Apellidos"]    , "Apellidos"                                   );
            $numero     = new CampoNumero   ("Numero"       , $post["Numero"]       , "Numero"                                      );
            $contraseña = new CampoPassword ("Contraseña"   , $post["Contraseña"]   , "Contraseña"                                  );
            $fecha      = new CampoFecha    ("Fecha"        , $post["Fecha"]        );
            $correo     = new CampoCorreo   ("Correo"       , $post["Correo"]       , "Correo"                                      );
            $sexo       = new CampoRadio    ("Sexo"         , $post["Sexo"]         , "Hombre","Mujer","Otro"                       );
            $curso      = new CampoSelect   ("Curso"        , $post["Curso"]        , "SMR","ASIR","DAW","DAM"                      );
            $estudios   = new CampoCheckbox ("Estudios"     , $post["Estudios"]     , "Primaria","ESO","Bachillerato","CFGM","CFGS" );
            $descripcion= new CampoTextArea ("Descripcion"  , $post["Descripcion"]  , "Descripcion"                                 );
            self::setClaves();
        }

        //Getter y setter de las claves.
        public static function setClaves(){
            foreach(Campo::getCampos() as $clave){
                self::$claves[] = $clave->getNombre();
                file_put_contents("./CSV/claves.csv",implode(',',self::$claves));
            }
        }
        public function getClaves() {   return self::$claves;   }
        public function getKeys()   {   return self::$keys;     }
    }
?>