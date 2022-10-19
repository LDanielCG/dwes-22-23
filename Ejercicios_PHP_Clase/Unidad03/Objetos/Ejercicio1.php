<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    //Crea la clase Circulo con el metodo setRadio y el metodo getRadio y getArea.
    //Tendra una propiedad privada para almacenar el radio.
    //Tendra una constante privada para almacenar PI.
    class Circulo {

        private $radio;
        private $PI = 3.1415;

        public function setRadio($radio) {
            $this->radio = $radio;
        }
        public function getRadio(){
            return $this->radio;
        }
        public function getArea(){
            return round($this->PI*pow($this->radio,2), 1);
        }
    }
    $Cir = new Circulo;

    $Cir->setRadio(5);

    echo "Radio: ";
    echo $Cir->getRadio();
    echo " cm<br/>Area: ";
    echo $Cir->getArea();
    echo " cm2";

?>

</body>
</html>

