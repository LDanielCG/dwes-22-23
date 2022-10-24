<?php 
    class Usuaruo {
        private $nombre;
        private $apellidos;
        private $deporte;
        private $nivel = 0;
        private $historicoPartidos = [];
        private $historicoPartidosOG = [];

        function __construct($nombre,$apellidos,$deporte){
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->deporte = $deporte;
        }
        function getNivel(){
            return $this->nivel."<br/>";
        }
        function introducirResultado($res) {
            $this->resContV();
            $this->resContD();
            $contV = 0;
            $contD = 0;
            if(strtolower($res) == "victoria"){
                
                array_push($this->historicoPartidos,"victoria");
                array_push($this->historicoPartidosOG,"victoria");
                echo "<br/>-----------------Victoria :)<br/>";

                for($i = 0; $i < sizeof($this->historicoPartidos); $i++){
                    if($this->historicoPartidos[$i] == "victoria"){
                        //$this->resContD();
                        
                        if($i != 0){
                            if($this->historicoPartidos[$i-1] != "victoria"){
                                $this->resContV();
                            }
                        }else if($i == 0){
                            $this->resContV();
                            $this->resContV();
                        }

                        $lvlCheck = $this->contV();
                        if($lvlCheck == 6 && $this->nivel != 6){
                            $this->nivel++;
                            //print_r($this->historicoPartidos);
                            echo "<br/>--------------------------LEVEL UP!<br/><br/>";
                            echo "-----------------Nivel: ".$this->getNivel();
                            $this->historicoPartidos = array_slice($this->historicoPartidos,$i+1);
                            $lvlCheck = 0;
                        }
                    }
                }
                
            }else if(strtolower($res) == "derrota"){
                array_push($this->historicoPartidos,"derrota");
                array_push($this->historicoPartidosOG,"derrota");
                echo "<br/>-----------------Derrota :(<br/>";
                for($i = 0; $i < sizeof($this->historicoPartidos); $i++){
                    if($this->historicoPartidos[$i] == "derrota"){
                        //$this->resContV();
                        
                        if($i != 0){
                            if($this->historicoPartidos[$i-1] != "derrota"){
                                $this->resContD();
                            }
                        }else if($i == 0){
                            $this->resContV();
                            $this->resContV();
                        }
                        
                        $lvlCheck = $this->contD();
                        if($lvlCheck == 6 && $this->nivel != 0){
                            $this->nivel--;
                            //print_r($this->historicoPartidos);
                            echo "<br/>--------------------------LEVEL DOWN!<br/><br/>";
                            echo "-----------------Nivel: ".$this->getNivel();
                            $this->historicoPartidos = array_slice($this->historicoPartidos,$i+1);
                            $lvlCheck = 0;
                        }
                    }
                }
                
            }else if(strtolower($res) == "empate"){
                $this->resContD();
                $this->resContV();
                array_push($this->historicoPartidos,"empate");
                array_push($this->historicoPartidosOG,"empate");
                echo "<br/>-----------------Empate :|<br/>";

                $key = array_search("empate", $this->historicoPartidos);
                $this->historicoPartidos = array_slice($this->historicoPartidos,$key);
            }

            
        }
        private $contV = 0;
        private $contD = 0;
        function contV(){
            $this->contV++;
            //echo "V: $this->contV</br>";
            return $this->contV;
        }
        function resContV(){
            $this->contV = 0;
            //echo "Reset V<br/>";
            return $this->contV;
        }

        function contD(){
            $this->contD++;
            //echo "D: $this->contD<br/>";
            return $this->contD;
        }
        function resContD(){
            $this->contD = 0;
            //echo "Reset D<br/>";
            return $this->contD;
        }

    }


    $us1 = new Usuaruo("PP","P2","Futbol");

    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    
   
    
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");

    

    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("empate");

    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");

    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");

    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("victoria");
    
?>