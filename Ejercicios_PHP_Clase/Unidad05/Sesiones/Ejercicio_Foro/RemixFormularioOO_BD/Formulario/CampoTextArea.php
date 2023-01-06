<?php
    namespace Formulario;
    class CampoTextArea extends Campo {
        protected $longitudMaxima;

        //Constantes.
        const  MAX_LENGTH = 255;
        
        
        //Constructor.
        function __construct(
            $nombre, 
            $datos              = self::DATOS_POR_DEFECTO, 
            $placeholder        = self::PLACEHOLDER_POR_DEFECTO, 
            $regex              = parent::PLACEHOLDER_POR_DEFECTO,
            $longitudMaxima     = self::MAX_LENGTH,
        ){
            $this->tipo             = "textarea";
            $this->longitudMaxima   = $longitudMaxima;
            parent::__construct($nombre, $datos, $placeholder, $regex);
        }

        //Validación específica.
        function validar(){
            parent::cleanData($this->datos);

            if(strlen($this->datos) == 0) {
                parent::$errores[$this->nombre] = "El contenido del mensaje no puede estar vacío."; 
            }
        }

        //Pintar campo.
        function pintarCampo(){ ?>
            <textarea require name="<?=$this->nombre?>" maxlength="<?=$this->longitudMaxima?>" class="escribir-mensaje-cuerpo" placeholder="<?=$this->placeholder?>"><?=$this->datos?></textarea>
        <?php }
    } ?>