<?php
    namespace Formulario;
    use \Formulario;
    class Controlador {
        private static $instance;
        private static $fichero = [];
        private static $claves = [];

        public static function singleton() {
            if(!isset(self::$instance)) {
                self::$instance = new Controlador();
            }
            return self::$instance;
        }

        public function recuperarUsuarios(){
            $usuarios = @file_get_contents(
                "./listado.csv"
            );
            
            if($usuarios != false){
                //Si existe el archivo.
                $usuarios = explode("\n", $usuarios);
                array_pop($usuarios);

                foreach($usuarios as $usuario){
                    $usuario = array_combine(self::$claves, explode(",", $usuario));
                    self::$fichero[] = new Usuario($usuario);
                }

            }else {
                //No existe el archivo, lo crea.
                self::$fichero = file_put_contents("./listado.csv", "");
            }

            return self::$fichero;
        }

        public function guardarUsuario(Usuario $usuario){
            file_put_contents(
                "./listado.csv",
                $usuario->getNombre()."\n",
                FILE_APPEND
            );
        }

        public function crearCampos($post){
            //Campos.
            $nombre     = new campoTexto("Nombre", $post["Nombre"], "Nombre");
            
            self::setClaves();
        }

        public static function setClaves(){
            foreach(Campo::getCampos() as $clave){
                self::$claves[] = $clave->getNombre();
            }
        }
        public static function getClaves(){return self::$claves;}


    }
?>