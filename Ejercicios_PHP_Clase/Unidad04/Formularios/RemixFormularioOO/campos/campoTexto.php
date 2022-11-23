<?php
    class campoTexto extends campo {
        protected $longitudMinima = 3;
        protected $longitudMaxima = 25;

        //Constructor.
        function __construct($nombre, $datos = null, $placeholder = null, $longitudMinima, $longitudMaxima, $regex = "[a-zA-ZÀ-ÿ\s]") {
            parent::$tipo = "text";
            $this->longitudMinima = $longitudMinima;
            $this->longitudMaxima = $longitudMaxima;
            parent::__construct($nombre, $datos, $placeholder, $regex);
        }

        //Validación especifica.
        function validar(){
            parent::validar();

            $regexCompleto = "/". $this->regex ."{".$this->longitudMinima.",".$this->longitudMaxima."}";

            if(!preg_match($regexCompleto, $this->datos)){
                parent::$errores[$this->nombre] = $this->nombre . "no válido. Longitud mínima: ".$this->longitudMinima." carácteres y longitud máxima: ".$this->longitudMaxima."."; 
            }
        }

        //Pintar campo.
        function pintarCampo(){ ?>
            <label>
                <?=$this->nombre?>:
                <input require type="<?=$this->tipo?>" name="<?=$this->nombre?>" value="<?=$this->datos?>" placeholder="<?=$this->placeholder?>">
            </label>
        <? }


    }
?>