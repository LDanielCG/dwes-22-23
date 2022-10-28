<?php
    namespace Edificio;
    class Edificio {
        private $altura;
        use \Posicion\Posicion;
        use \Descripcion\Descripcion;
        function getAltura(){
            return $this->altura;
        }
        function setAltura($alt){
            $this->altura = $alt;
        }
    }
?>