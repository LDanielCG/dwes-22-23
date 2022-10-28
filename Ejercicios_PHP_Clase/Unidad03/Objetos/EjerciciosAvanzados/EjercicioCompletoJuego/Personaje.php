<?php
    namespace Personaje;
    interface Personaje{
        use \Posicion\Posicion;
        function atacar();
        function defender();
    }
?>