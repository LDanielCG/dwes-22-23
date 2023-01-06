<?php
    namespace Formulario;

    class CampoNumero extends Campo {

        //Constructor.
        function __construct(
            $nombre,
            $datos          = parent::DATOS_POR_DEFECTO,
            $placeholder    = parent::PLACEHOLDER_POR_DEFECTO,
            $regex          = parent::REGEX_POR_DEFECTO,
        ){
            $this->tipo         = "number";
            parent::__construct($nombre,$datos,$placeholder,$regex);
        }

        //Validación específica.
        function validar(){ parent::validar(); }

        //Pintar campo.
        function pintarCampo(){ ?>
            <input required type="<?=$this->tipo?>" name="<?=$this->nombre?>" value="<?=$this->datos?>" placeholder="<?=$this->placeholder?>" min=<?=$this->num_minimo?> max=<?=$this->num_maximo?>>
        <?php }
    }
?>