<?php 
    class Usuario {
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
            echo "Usuario ".$nombre." ".$apellidos." creado.<br/>";
        }
        function getNivel(){
            return $this->nivel;
        }
        function introducirResultado($res) {
            $this->resContV();
            $this->resContD();

            if(strtolower($res) == "victoria"){
                array_push($this->historicoPartidos,"victoria");
                array_push($this->historicoPartidosOG,"victoria");
                echo "<br/>-----------------Usuario ".$this->nombre." gana partido.<br/>";

                for($i = 0; $i < sizeof($this->historicoPartidos); $i++){
                    if($this->historicoPartidos[$i] == "victoria"){
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
                            echo "<br/>--------------------------Usuario ".$this->nombre." sube al nivel ".$this->getNivel().".<br/><br/>";
                            $this->historicoPartidos = array_slice($this->historicoPartidos,$i+1);
                            $lvlCheck = 0;
                        }
                    }
                }
                
            }else if(strtolower($res) == "derrota"){
                array_push($this->historicoPartidos,"derrota");
                array_push($this->historicoPartidosOG,"derrota");
                echo "<br/>-----------------Usuario ".$this->nombre." pierde partido.<br/>";
                for($i = 0; $i < sizeof($this->historicoPartidos); $i++){
                    if($this->historicoPartidos[$i] == "derrota"){
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
                            echo "<br/>--------------------------Usuario ".$this->nombre." baja al nivel ".$this->getNivel().".<br/><br/>";
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
            return $this->contV;
        }
        function resContV(){
            $this->contV = 0;
            return $this->contV;
        }

        function contD(){
            $this->contD++;
            return $this->contD;
        }
        function resContD(){
            $this->contD = 0;
            return $this->contD;
        }


        function imprimirInformacion(){
            echo "<p>- Nombre: ".$this->nombre." ".$this->apellidos."</p>";
            echo "<p>- Deporte: ".$this->deporte."</p>";
            echo "<p>- Historico de partidos: </p>";
            $vic = 0;
            $derr = 0;
            $emp = 0;
            foreach($this->historicoPartidosOG as $key => $value){
                if($value == "victoria"){
                    $vic++;
                }
                if($value == "derrota"){
                    $derr++;
                }
                if($value == "empate"){
                    $emp++;
                }
            }
            echo "<ul>";
            echo "<li>Victorias: ".$vic."</li>";
            echo "<li>Derrotas: ".$derr."</li>";
            echo "<li>Empates: ".$emp."</li>";
            echo "</ul>";
        }

    }

?>