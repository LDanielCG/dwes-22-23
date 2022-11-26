<?php
    namespace Formulario;

    class campoNumero extends Campo {
        protected $num_minimo;
        protected $num_maximo;
        
        //Constantes.
        const REGEX_TLF_ESPANOL = '/^[69]{1}[0-9]{8}$/';
        const MIN_NUMBER = 600000000;
        const MAX_NUMBER  = 999999999;

        //Constructor.
        function __construct(
            $nombre,
            $datos          = parent::DATOS_POR_DEFECTO,
            $placeholder    = parent::PLACEHOLDER_POR_DEFECTO,
            $regex          = self::REGEX_TLF_ESPANOL,
            $num_minimo     = self::MIN_NUMBER,
            $num_maximo     = self::MAX_NUMBER
        ){
            $this->tipo         = "number";
            $this->num_minimo   = $num_minimo;
            $this->num_maximo   = $num_maximo;
            parent::__construct($nombre,$datos,$placeholder,$regex);
        }

        //Validación específica.
        function validar(){
            parent::validar();

            if(!preg_match($this->regex, $this->datos)){
                parent::$errores[$this->nombre] = ucfirst($this->nombre) . " tiene que empezar por 6 o 9 y tener una longitud total de 9 dígitos.";
            }
        }

        //Pintar campo.
        function pintarCampo(){ ?>
            <label>
                <?=ucfirst($this->nombre)?>:
                <input required type="<?=$this->tipo?>" name="<?=$this->nombre?>" value="<?=$this->datos?>" placeholder="<?=$this->placeholder?>" min=<?=$this->num_minimo?> max=<?=$this->num_maximo?>>
            </label>
        <?php }
    }
?>