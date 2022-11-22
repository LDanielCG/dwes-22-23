<?php
    abstract class campo {
        protected $nombre;
        protected $datos;
        protected $placeholder;
        protected $regex;
        protected static $errores = [];

        //Constructor.
        function __construct($nombre, $datos = null, $placeholder = null, $regex = null){
            $this->nombre = $nombre;
            $this->datos = $datos;
            $this->placeholder = $placeholder;
            $this->regex = $regex;
        }
        //Clean data.
        protected function cleanData(&$data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data, ENT_QUOTES, "UTF-8");
        }
        //Validar.
        function validar(){
            self::cleanData($this->data);

            //Comprobación genérica.
            if(empty($this->data)){
                self::$errores = $this->nombre.' está vacío.';
            }
        }
        //Pintar campo
        abstract public function pintarCampo();


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