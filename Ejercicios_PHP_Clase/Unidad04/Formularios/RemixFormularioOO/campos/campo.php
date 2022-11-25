<?php
    abstract class campo {
        protected $tipo;
        protected $nombre;
        protected $datos;
        protected $placeholder;
        protected $regex;
        protected static $errores = [];
        protected static $campos = [];

        //Constantes.
        public static const DATOS_POR_DEFECTO = null;
        public static const PLACEHOLDER_POR_DEFECTO = null;


        //Constructor.
        function __construct($nombre, $datos = self::DATOS_POR_DEFECTO, $placeholder = self::PLACEHOLDER_POR_DEFECTO, $regex = null){
            $this->nombre = $nombre;
            $this->datos = $datos;
            $this->placeholder = $placeholder;
            $this->regex = $regex;
            self::$campos[] = $this;
        }

        //Clean data.
        protected function cleanData(&$data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data, ENT_QUOTES, "UTF-8");
        }

        //Validar.
        function validar(){
            self::cleanData($this->datos);

            //Comprobación genérica.
            if(empty($this->datos)){
                self::$errores = $this->nombre.' está vacío.';
            }
        }

        //Pintar campo
        abstract public function pintarCampo();

        //Pintar formulario
        function pintarFormulario(){
            foreach($this->campos as $campo){
                $campo->pintarCampo();
            }
        }

        //Getters
        function getNombre(){return $this->nombre;}
        function getDatos(){return $this->datos;}
        function getPlaceholder(){return $this->placeholder;}
        function getRegex(){return $this->regex;}
        //Setters
        function setNombre($nom){$this->nombre = $nom;}
        function setDatos($dat){$this->datos = $dat;}
        function setPlaceholder($plac){$this->placeholder = $plac;}
        function setRegex($reg){$this->regex = $reg;}
    }
?>