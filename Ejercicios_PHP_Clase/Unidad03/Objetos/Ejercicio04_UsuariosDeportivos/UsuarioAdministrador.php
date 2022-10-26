<?php
    class UsuarioAdministrador extends Usuario{
        function __construct($nombre,$apellidos,$deporte){
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->deporte = $deporte;
            echo "Usuario administrador ".$nombre." ".$apellidos." creado.<br/>";
        }

        function crearPartido(){
            echo "Partido creado.<br/>";
        }
        function getRacha(){
            return 3;
        }
        function getNombreCompleto(){
            return "(Admin) ".$this->nombre." ".$this->apellidos;
        }
    }
?>