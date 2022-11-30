<?php
    namespace Formulario;
    class ControladorUsuario {
        private static $instance;

        //Propiedades del usuario.
        private $nombre;        //CampoTexto
        private $direccion;     //CampoTexto
        private $extras;        //CampoCheckbox


        public static function singleton(){
            if(!isset(self::$instance)){
                self::$instance = @new ControladorUsuario();
            }
            return self::$instance;
        }


        //Creacion de los campos.
        public function crearCampos($post){
            //Campos                  Tipo_campo    | nombre         | datos_campo           | Placeholder & Opciones Radio,Select,Checkbox                             | Regex     | MinLength     | MaxLength
            @$this->nombre       = new CampoTexto    ("Nombre"       , $post["Nombre"]       , "Nombre del queso.");
            @$this->direccion    = new CampoTexto    ("Direccion"    , $post["Direccion"]    , "Direccion de envio.");
            @$this->extras       = new CampoCheckbox ("Extras"       , $post["Extras"]       , "Caja madera","Tarjeta regalo","Envio urgente","Panecillos","Membrillo" );
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
        public function getNombre()    {   return $this->nombre;    }
        public function getDireccion() {   return $this->direccion; }
        public function getExtras()    {   return $this->extras;    }

        //Setters.
        public function setNombre($nom)    {   $this->nombre    = $nom; }
        public function setDireccion($dir) {   $this->direccion = $dir; }
        public function setExtras($ext)    {   $this->extras    = $ext; }

    }
?>