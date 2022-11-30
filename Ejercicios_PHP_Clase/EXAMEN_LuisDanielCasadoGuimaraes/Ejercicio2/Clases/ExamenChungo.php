<?php
    class ExamenChungo extends AExamen{
        const NUM_MINIMO = 0;
        const NUM_MAX = 7;
        
        function obtenerNota(){
            return rand(self::NUM_MINIMO,self::NUM_MAX);
        }
    }
?>