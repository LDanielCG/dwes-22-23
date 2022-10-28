<?php
    trait Posicion {
        private $x;
        private $y;
        private $z;

        function getX(){
            return $this->x;
        }
        function getY(){
            return $this->y;
        }
        function getZ(){
            return $this->z;
        }

        function setX($posX){
            $this->x = $posX;
        }
        function setY($posY){
            $this->y = $posY;
        }
        function setZ($posZ){
            $this->z = $posZ;
        }
    }
?>