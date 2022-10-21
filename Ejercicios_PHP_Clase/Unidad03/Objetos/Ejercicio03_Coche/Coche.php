<?php 
        class Coche {
            private $matricula;
            private $marca;
            private $carga;

            public function __construct($matricula,$marca,$carga){
                $this->matricula = $matricula;
                $this->marca = $marca;
                $this->carga = $carga;
            }

            public function pintarInformacion(){
                echo "Coche: $this->matricula, $this->marca con carga: $this->carga.";
            }

            public function getMatricula(){
                return $this->matricula;
            }
            public function setMatricula($mat){
                $this->matricula = $mat;
            }
            public function getMarca(){
                return $this->marca;
            }
            public function setMarca($mar){
                $this->marca = $mar;
            }
            public function getCarga(){
                return $this->carga;
            }
            public function setCarga($car){
                $this->carga = $car;
            }

        }    
?>