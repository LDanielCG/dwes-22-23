<?php
    namespace Formulario;
    class CampoCheckbox extends Campo {
        private $valores = [];

        //Constructor.
        public function __construct(
            $nombre,
            $datos = parent::DATOS_POR_DEFECTO,
            string ...$valores
        ){
            $this->tipo = "checkbox";
            foreach($valores as $valor){
                $this->valores[] = $valor;
            }
            parent::__construct($nombre, $datos, parent::PLACEHOLDER_POR_DEFECTO, parent::REGEX_POR_DEFECTO);
        }


        //Comprobación específica.
        function validar(){
            if(empty($this->datos)){
                self::$errores[$this->nombre] = ucfirst($this->nombre) . ' está vacío.';
            }

            foreach($this->datos as $dato){
                if(!in_array($dato, $this->valores)){
                    parent::$errores[$this->nombre] = ucfirst($this->nombre) . " tiene un valor no válido.";
                }
            }
        }

        //Pintar campo.
        function pintarCampo(){ ?>
            <label>
                <?=ucfirst($this->nombre)?>:
                <div>
                    <?php foreach($this->valores as $valor){ ?>
                        <label>
                            <input type="<?=$this->tipo?>" name="<?=$this->nombre?>[]" value="<?=$valor?>" <?=(in_array($valor, ($this->datos == null)?[]:$this->datos))?"checked":"";?>> <?=$valor?>
                        </label>
                    <?php } ?>
                </div>
            </label>
        <?php }
    }
?>