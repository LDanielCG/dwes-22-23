<?php
    namespace Mago;
    abstract class Mago implements \Personaje\Personaje {
        abstract function atacar();
        function defender(){
            echo "Hechizo protector.<br/>";
        }
    }
?>