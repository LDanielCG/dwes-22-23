<?php
    class UsuarioAdministrador extends Usuario{
        function __construct($nombre,$apellidos,$deporte){
            $this->nombre = "(Admin) ".$nombre;
            $this->apellidos = $apellidos;
            $this->deporte = $deporte;
            echo "Usuario administrador ".$nombre." ".$apellidos." creado.<br/>";
        }

        function crearPartido(){
            echo "Partido creado.<br/>";
        }
    }
?>