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
        class CocheConRemolque extends Coche{
            private $capacidadRemolque;

            public function __construct($matricula,$marca,$carga,$capacidadRemolque){
                parent::__construct($matricula,$marca,$carga);
                $this->capacidadRemolque = $capacidadRemolque;
            }

            public function pintarInformacion(){
                parent::pintarInformacion();
                echo " y remolque de $this->capacidadRemolque";
            }

            public function getCapacidadRemolque(){
                return $this->capacidadRemolque;
            }
            public function setCapacidadRemolque($cap){
                $this->capacidadRemolque = $cap;
            }
        }
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
        
        
    /*
        echo "---GETTERS COCHE 1---<br/><br/>";
        echo $coche1->getMatricula()."<br/>";
        echo $coche1->getMarca()."<br/>";
        echo $coche1->getCarga()."<br/><br/><br/>";

        echo "---PINTAR INFO DE COCHE 1---<br/><br/>";
        echo $coche1->pintarInformacion()."<br/><br/><br/>";

        //---SETTERS COCHE 1---
        $coche1->setMatricula("M001");
        $coche1->setMarca("YaNoEsAudi");
        $coche1->setCarga("Carga algo pero diferente");
        //Tras los setter
        echo "---GETTERS COCHE 1 DESPUES DE LOS SETTER---<br/><br/>";
        echo $coche1->getMatricula()."<br/>";
        echo $coche1->getMarca()."<br/>";
        echo $coche1->getCarga()."<br/><br/><br/>";

        echo "---PINTAR INFO DE COCHE 1 DESPUES DE SETTERS---<br/><br/>";
        echo $coche1->pintarInformacion()."<br/><br/><br/>";


        echo "---GETTERS COCHE 2---<br/><br/>";
        echo $coche2->getMatricula()."<br/>";
        echo $coche2->getMarca()."<br/>";
        echo $coche2->getCarga()."<br/>";
        echo $coche2->getCapacidadRemolque()."<br/><br/><br/>";

        echo "---PINTAR INFO DE COCHE 2---<br/><br/>";
        echo $coche2->pintarInformacion()."<br/><br/>";

        //---SETTERS COCHE 2---
        $coche2->setMatricula("M002");
        $coche2->setMarca("YaNoEsCitroen");
        $coche2->setCarga("Carga otra cosa pero diferente");
        $coche2->setCapacidadRemolque("20kg o algo");
        //Tras los setter
        echo "---GETTERS COCHE 2 DESPUES DE LOS SETTER---<br/><br/>";
        echo $coche2->getMatricula()."<br/>";
        echo $coche2->getMarca()."<br/>";
        echo $coche2->getCarga()."<br/>";
        echo $coche2->getCapacidadRemolque()."<br/><br/><br/>";

        echo "---PINTAR INFO DE COCHE 2 DESPUES DE SETTERS---<br/><br/>";
        echo $coche2->pintarInformacion()."<br/><br/>";
    */    
        $coche1 = new Coche("1000","BMW",30);
        $coche2 = new CocheConRemolque("1001","Renault",30,200);
        $coche3 = new Coche("1002","Porche",40);    
        $cocheGrua = new CocheGrua("1003","Renault",20);

        $cocheGrua->cargar($coche3);
        $cocheGrua->cargar($coche1);
        $cocheGrua->cargar($coche2);
        $cocheGrua->cargar($cocheGrua);
        
        $cocheGrua->pintarInformacion();
        //echo "<br/><br/>";
        //$cocheGrua->descargar($coche1);
        //$cocheGrua->pintarInformacion();
    
    ?>






</body>
</html>