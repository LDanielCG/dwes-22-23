<?php
    trait Descripcion {
        private $descripcion;
 

        function getDescripcion(){
            return $this->descripcion;
        }
        function setDescripcion($desc){
            $this->descripcion = $desc;
        }
    }
?>