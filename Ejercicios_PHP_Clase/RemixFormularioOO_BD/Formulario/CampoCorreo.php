<?php
    namespace Formulario;
    class CampoCorreo extends Campo {

        //Constantes.
        const REGEX_CORREO_ELECTRONICO = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,3})$/";
        //Constructor.
        function __construct(
            $nombre,
            $datos          = parent::DATOS_POR_DEFECTO,
            $placeholder    = parent::PLACEHOLDER_POR_DEFECTO,
            $regex          = self::REGEX_CORREO_ELECTRONICO
        ){
            $this->tipo = "mail";
            parent::__construct($nombre, $datos, $placeholder, $regex);
        }


        //Validación específica.
        function validar(){
            parent::validar();

            if(!preg_match($this->regex, $this->datos)){
                parent::$errores[$this->nombre] = ucfirst($this->nombre) . " no es un correo válido.";
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