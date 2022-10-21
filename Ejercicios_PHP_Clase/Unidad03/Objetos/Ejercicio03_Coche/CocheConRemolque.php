<?php
    class CocheConRemolque extends Coche{
        private $capacidadRemolque;

        public function __construct($matricula,$marca,$carga,$capacidadRemolque){
            parent::__construct($matricula,$marca,$carga);
            $this->capacidadRemolque = $capacidadRemolque;
        }

        public function pintarInformacion(){
            parent::pintarInformacion();
            echo " y remolque de $this->capacidadRemolque";
        }

        public function getCapacidadRemolque(){
            return $this->capacidadRemolque;
        }
        
        public function setCapacidadRemolque($cap){
            $this->capacidadRemolque = $cap;
        }
    }
?>