<?php
    class UsuarioPremium extends Usuario{
        function __construct($nombre,$apellidos,$deporte){
            $this->nombre = "(Premium) ".$nombre;
            $this->apellidos = $apellidos;
            $this->deporte = $deporte;
            echo "Usuario premium ".$nombre." ".$apellidos." creado.<br/>";
        }
    }
?>