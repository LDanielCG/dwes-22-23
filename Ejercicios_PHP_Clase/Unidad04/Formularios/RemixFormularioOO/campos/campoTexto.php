<?php
    class campoTexto extends campo {
        protected $longitudMinima;
        protected $longitudMaxima;

        //Constantes.
        public static const MIN_LENGTH = 3;
        public static const  MAX_LENGTH = 25;
        public static const REGEX_SOLO_LETRAS = "[a-zA-ZÀ-ÿ\s]";
        
        

        //Constructor.
        function __construct($nombre, $datos = self::DATOS_POR_DEFECTO, $placeholder = self::PLACEHOLDER_POR_DEFECTO, $longitudMinima = self::MIN_LENGTH, $longitudMaxima = self::MAX_LENGTH, $regex = self::REGEX_SOLO_LETRAS) {
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
        <?php }
    } ?>