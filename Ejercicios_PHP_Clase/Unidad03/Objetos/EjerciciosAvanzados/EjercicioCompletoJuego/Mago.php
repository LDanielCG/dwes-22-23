<?php
    abstract class Mago implements Personaje {
        abstract function atacar();
        function defender(){
            echo "Hechizo protector.<br/>";
        }
    }
?>