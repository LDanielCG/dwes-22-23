<?php
    namespace Formulario;
    class CampoHidden extends Campo {

        //Constructor.
        function __construct(
            $nombre, 
            $datos              = self::DATOS_POR_DEFECTO, 
            $placeholder        = parent::PLACEHOLDER_POR_DEFECTO, 
            $regex              = parent::REGEX_POR_DEFECTO
        ){
            $this->tipo             = "hidden";
            parent::__construct($nombre, $datos, $placeholder, $regex);
        }

        //Validación específica.
        function validar(){ parent::cleanData($this->datos); }

        //Pintar campo.
        function pintarCampo(){ ?>
            <input require type="<?=$this->tipo?>" name="<?=$this->nombre?>" value="<?=(isset($_SESSION[$this->nombre]))?$_SESSION[$this->nombre]:NULL ?>">
        <?php }
    } ?>