<?php
    abstract class AExamen implements IExamen {
        use TtieneFecha;
        protected $nombre;

        function intentar($nombre){
            $this->nombre = $nombre;
        }

        function getNombre(){return $this->nombre;}
    }
?>