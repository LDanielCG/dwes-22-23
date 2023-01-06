<?php
    namespace Formulario;
    abstract class Campo {
        protected $tipo;
        protected $nombre;
        protected $datos;
        protected $placeholder;
        protected $regex;
        protected static $errores = [];
        protected static $campos = [];

        //Constantes.
        const DATOS_POR_DEFECTO = null;
        const PLACEHOLDER_POR_DEFECTO = null;
        const REGEX_POR_DEFECTO = null;

        //Constructor.
        function __construct(
            $nombre, 
            $datos          = self::DATOS_POR_DEFECTO, 
            $placeholder    = self::PLACEHOLDER_POR_DEFECTO, 
            $regex          = self::REGEX_POR_DEFECTO
        ){
            $this->nombre       = $nombre;
            $this->datos        = $datos;
            $this->placeholder  = $placeholder;
            $this->regex        = $regex;
            self::$campos[]     = $this;
        }

        //Clean data.
        protected function cleanData(&$data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data, ENT_QUOTES, "UTF-8");
        }

        //Validar.
        protected function validar(){
            self::cleanData($this->datos);

            //Comprobación genérica.
            if(empty($this->datos)){
                self::$errores[$this->nombre] = ucfirst($this->nombre) . ' está vacío.';
            }
        }

        //Pintar campo
        abstract public function pintarCampo();


        //Pintar formulario
        static function pintarFormularioMensaje(){ 
            //Comprobacion de errores
            if(count(self::getErrores()) > 0){
                foreach(self::getErrores() as $error){
                    echo "<p>$error</p>";
                }
            }else if(@$_GET["success"]){
                echo "<p class='success'>Post publicado con exito.</p>";
            }
        ?>
            <form action="index.php" method="post">
                <div class="escribir-mensaje-Cont">
                    <?php foreach(self::$campos as $campo){ $campo->pintarCampo(); } ?>
                    <input type="submit" value="Enviar" name="submit" class="escribir-mensaje-Enviar">
                </div>
            </form>
        <?php }

        //Getters
        function getTipo()              {   return $this->tipo;         }
        function getNombre()            {   return $this->nombre;       }
        function getDatos()             {   return $this->datos;        }
        function getPlaceholder()       {   return $this->placeholder;  }
        function getRegex()             {   return $this->regex;        }
        static function getCampos()     {   return self::$campos;       }
        static function getErrores()    {   return self::$errores;      }
        //Setters
        function setTipo($tip)          {   $this->tipo = $tip;         }
        function setNombre($nom)        {   $this->nombre = $nom;       }
        function setDatos($dat)         {   $this->datos = $dat;        }
        function setPlaceholder($plac)  {   $this->placeholder = $plac; }
        function setRegex($reg)         {   $this->regex = $reg;        }
    }
?>