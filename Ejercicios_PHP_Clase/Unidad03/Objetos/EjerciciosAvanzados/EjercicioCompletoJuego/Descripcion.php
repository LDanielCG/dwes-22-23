<?php
    namespace Descripcion;
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