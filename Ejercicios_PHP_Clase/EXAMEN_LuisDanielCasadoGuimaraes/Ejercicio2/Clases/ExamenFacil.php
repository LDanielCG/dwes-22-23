<?php
    class ExamenFacil extends AExamen{
        const NUM_MINIMO = 5;
        const NUM_MAX = 10;

        function obtenerNota(){
            return rand(self::NUM_MINIMO,self::NUM_MAX);
        }
    }
?>