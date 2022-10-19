<?php


    class EstaEsMiPrimeraClase{
        //$atributoUno = 'Jorge Dueñas Lerin'; // Error
        public $atributoDos = '42';
        private $atributoTres = 'Naranja';

        public function muestraTres() { // por defecto publica
            echo $this->atributoTres;
            echo "<br/>";
        }

    }


?>

<?php

//Array vs objeto
$arrA = [];
$arrB = $arrA;

$objA = new EstaEsMiPrimeraClase();
$objB = $objA;

$arrA [] = 4;
$objA->atributoDos //???


?>