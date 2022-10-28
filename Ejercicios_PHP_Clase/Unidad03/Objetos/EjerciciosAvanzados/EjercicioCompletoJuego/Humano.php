<?php
    class Humano implements Personaje{
        use Posicion;
        function atacar(){
            echo "Puñetazo.<br/>";
        }
        function defender(){
            echo "Bloqueo.<br/>";
        }
    }
?>