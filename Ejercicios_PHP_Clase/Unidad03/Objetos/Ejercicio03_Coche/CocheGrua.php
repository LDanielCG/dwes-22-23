<?php
    class CocheGrua extends Coche{
        private $cocheCargado;
        private $cargados = [];

        public function cargar($coche){
            array_push($this->cargados, $coche);
        }

        public function descargar($coche){
            $key = array_search($coche,$this->cargados,true);
            if($key !== false){
                unset($this->cargados[$key]);
            }
        }

        public function pintarInformacion(){
            echo "<div>";
            parent::pintarInformacion();
            foreach($this->cargados as $key => $value){
                echo "<div>Lleva coche: ".$this->cargados[$key]->getMatricula();
                echo ", ".$this->cargados[$key]->getMarca();
                echo " con carga: ".$this->cargados[$key]->getCarga()."</div>";
            }
            echo "</div>";
        }
    }
?>