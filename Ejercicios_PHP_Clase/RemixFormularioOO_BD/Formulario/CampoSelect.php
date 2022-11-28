<?php
    namespace Formulario;
    class CampoSelect extends Campo {
        private $lista = [];

        //Constructor.
        function __construct(
            $nombre,
            $datos = parent::DATOS_POR_DEFECTO,
            string ...$lista
        ){
            $this->tipo = "select";
            foreach($lista as $opcion){
                $this->lista[] = $opcion;
            }
            parent::__construct($nombre, $datos, parent::PLACEHOLDER_POR_DEFECTO, parent::REGEX_POR_DEFECTO);
        }

        //Validación específica.
        function validar(){
            if(!in_array($this->datos, $this->lista)){
                parent::$errores[$this->nombre] = ucfirst($this->nombre) . " inválido.";
            }
        }

        //Pintar campo.
        function pintarCampo(){ ?>
            <label>
                <?=ucfirst($this->nombre)?>:
                <select name="<?=$this->nombre?>">
                    <?php foreach($this->lista as $opcion){ ?>
                        <option value="<?=$opcion?>" <?=($this->datos == $opcion)?"selected":"";?>><?=$opcion?></option>
                    <?php } ?>
                </select>
            </label>
        <?php }
    }
?>