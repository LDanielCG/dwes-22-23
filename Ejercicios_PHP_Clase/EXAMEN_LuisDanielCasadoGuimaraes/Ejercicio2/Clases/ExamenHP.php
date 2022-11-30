<?php
    class ExamenHP extends AExamen{
        const NUM_MINIMO = 3;
        const NUM_MAX = 4;
        //Ya que no hay decimales he decidido que la nota minima sea 3 y la maxima 4.
        function obtenerNota(){
            return rand(self::NUM_MINIMO,self::NUM_MAX);
        }
    }
?>