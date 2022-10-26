<?php
    class UsuarioPremium extends Usuario{
        function __construct($nombre,$apellidos,$deporte){
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->deporte = $deporte;
            echo "Usuario premium ".$nombre." ".$apellidos." creado.<br/>";
        }
        function getRacha(){
            return 3;
        }
        function getNombreCompleto(){
            return "(Premium) ".$this->nombre." ".$this->apellidos;
        }
    }
?>