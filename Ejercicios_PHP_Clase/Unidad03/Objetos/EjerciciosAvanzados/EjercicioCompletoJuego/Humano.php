<?php
    namespace Humano;
    class Humano implements \Personaje\Personaje{
        use \Posicion\Posicion;
        function atacar(){
            echo "Puñetazo.<br/>";
        }
        function defender(){
            echo "Bloqueo.<br/>";
        }
    }
?>