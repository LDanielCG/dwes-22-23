<?php
    class Objetos {
        private $peso;
        //private $descripcion;
        use Posicion;
        use Descripcion;
        function getPeso(){
            return $this->peso;
        }
        function setPeso($pes){
            $this->peso = $pes;
        }
        /*
        function getDescripcion(){
            return $this->descripcion;
        }
        function setDescripcion($desc){
            $this->descripcion = $desc;
        }*/
    }
?>