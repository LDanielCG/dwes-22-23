<?php
    class Edificio {
        private $altura;
        use Posicion;
        use Descripcion;
        function getAltura(){
            return $this->altura;
        }
        function setAltura($alt){
            $this->altura = $alt;
        }
    }
?>