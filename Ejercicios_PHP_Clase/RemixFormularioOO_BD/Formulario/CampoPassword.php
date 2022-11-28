<?php
    namespace Formulario;

    class CampoPassword extends Campo {
        protected $longitudMinima;
        protected $longitudMaxima;

        //Constantes.
        const MIN_LENGTH = 8;
        const  MAX_LENGTH = 64;
        const REGEX_LETRAS_NUMEROS_BARRA_BAJA = "[\w]";

        //Constructor.
        function __construct(
            $nombre, 
            $datos              = parent::DATOS_POR_DEFECTO, 
            $placeholder        = parent::PLACEHOLDER_POR_DEFECTO, 
            $regex              = self::REGEX_LETRAS_NUMEROS_BARRA_BAJA, 
            $longitudMinima     = self::MIN_LENGTH,
            $longitudMaxima     = self::MAX_LENGTH
        ){
            $this->tipo             = "password";
            $this->longitudMinima   = $longitudMinima;
            $this->longitudMaxima   = $longitudMaxima;
            parent::__construct($nombre, $datos, $placeholder, $regex);
        }

        //Validación específica.
        function validar(){
            parent::validar();

            $regexCompleto = "/". $this->regex ."{".$this->longitudMinima.",".$this->longitudMaxima."}/";

            if(!preg_match($regexCompleto, $this->datos)){
                parent::$errores[$this->nombre] = ucfirst($this->nombre) . " no válida. Longitud mínima: ".$this->longitudMinima." carácteres y longitud máxima: ".$this->longitudMaxima.".";
            }
        }

        //Pintar campo.
        function pintarCampo(){ ?>
            <label>
                <?=ucfirst($this->nombre)?>:
                <input required type="<?=$this->tipo?>" name="<?=$this->nombre?>" value="<?=$this->datos?>" placeholder="<?=$this->placeholder?>">
            </label>
        <?php }
    }
?>