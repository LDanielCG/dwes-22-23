<?php
    namespace Formulario;

    class CampoFecha extends Campo {
        private $edadMinima;
        private $edadMaxima;

        //Constantes.
        const MIN_EDAD = 16;
        const MAX_EDAD = 65;

        //Constructor.
        function __construct(
            $nombre,
            $datos          = parent::DATOS_POR_DEFECTO,
            $edadMinima     = self::MIN_EDAD,
            $edadMaxima     = self::MAX_EDAD
        ){
            $this->tipo         = "date";
            $this->edadMinima   = $edadMinima;
            $this->edadMaxima   = $edadMaxima;
            parent::__construct(
                $nombre, 
                $datos, 
                parent::PLACEHOLDER_POR_DEFECTO, 
                parent::REGEX_POR_DEFECTO
            );
        }

        //Comprobación específica.
        function validar(){
            parent::validar();

            $sysdate = new \DateTime("now");
            $sysdate->format("Y-m-d");

            $diff = date_diff(new \DateTime($this->datos), $sysdate);
            $diff = intval($diff->format("%R%y")); // %R = +/- | %y = años

            if($diff <= $this->edadMinima){
                parent::$errores[$this->nombre] = "El usuario tiene que ser mayor de " . $this->edadMinima . "  años.";
            }else if($diff > $this->edadMaxima){
                parent::$errores[$this->nombre] = "El usuario tiene que ser menor de " . $this->edadMaxima . "  años.";
            }
        }

        function pintarCampo(){ ?>
            <label>
                <?=ucfirst($this->nombre)?>:
                <input required type="<?=$this->tipo?>" name="<?=$this->nombre?>" value="<?=$this->datos?>">
            </label>
        <?php }
    }
?>