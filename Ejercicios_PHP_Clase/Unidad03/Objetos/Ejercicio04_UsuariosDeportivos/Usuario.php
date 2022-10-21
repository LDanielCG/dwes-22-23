<?php 
    class Usuaruo {
        private $nombre;
        private $apellidos;
        private $deporte;
        private $nivel = 0;
        private $historicoPartidos = [];

        function __construct($nombre,$apellidos,$deporte){
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->deporte = $deporte;
        }
        function getNivel(){
            return $this->nivel."<br/>";
        }
        function introducirResultado($res) {
            switch(strtolower($res)){
                case "victoria":
                    array_push($this->historicoPartidos,"victoria");
                    echo "Victoria :D<br/>";
                    $contV = 0;
                    foreach($this->historicoPartidos as $key => $value){
                        if($value == "victoria"){
                            $contV++;
                            //echo $contV;
                            if($contV == 6 && $this->nivel != 6){
                                echo "LEVEL UP!<br/>";
                                $this->nivel++;
                            }
                        }
                    }
                    break;
                case "derrota":
                    array_push($this->historicoPartidos,"derrota");
                    echo "Derrota :(<br/>";
                    $contD = 0;
                    foreach($this->historicoPartidos as $key => $value){
                        if($value == "derrota"){
                            $contD++;
                            //echo $contD;
                            if($contD == 6 && $this->nivel != 0){
                                echo "LEVEL DOWN!<br/>";
                                $this->nivel-1;
                            }
                        }
                    }
                    break;
                case "empate":
                    array_push($this->historicoPartidos,"empate");
                    echo "Empate :|";
                    break;
            }
            //print_r($this->historicoPartidos);

        }


    }


    $us1 = new Usuaruo("PP","P2","Futbol");

    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    
    echo $us1->getNivel();
    
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");

    echo $us1->getNivel();



?>