<?php
    namespace Formulario;
    class CampoRadio extends Campo {
        private $valores = [];

        //Constructor.
        public function __construct(
            $nombre,
            $datos = parent::DATOS_POR_DEFECTO,
            string ...$valores
        ){
            $this->tipo = "radio";
            foreach($valores as $valor){
                $this->valores[] = $valor;
            }
            parent::__construct($nombre, $datos, parent::PLACEHOLDER_POR_DEFECTO, parent::REGEX_POR_DEFECTO);
        }


        //Comprobación específica.
        function validar(){
            if(!in_array($this->datos, $this->valores)){
                parent::$errores[$this->nombre] = ucfirst($this->nombre) . " tiene un valor no válido.";
            }
        }

        //Pintar campo.
        function pintarCampo(){ ?>
            <label>
                <?=ucfirst($this->nombre)?>:
                <div>
                    <?php foreach($this->valores as $valor){ ?>
                        <label>
                            <input type="<?=$this->tipo?>" name="<?=$this->nombre?>" value="<?=$valor?>" <?=($valor == $this->datos)?"checked":"";?>> <?=$valor?>
                        </label>
                    <?php } ?>
                </div>
            </label>
        <?php }
    }
?>