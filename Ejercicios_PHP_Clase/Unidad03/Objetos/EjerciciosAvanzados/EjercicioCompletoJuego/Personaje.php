<?php
    interface Personaje{
        use Posicion;
        function atacar();
        function defender();
    }
?>