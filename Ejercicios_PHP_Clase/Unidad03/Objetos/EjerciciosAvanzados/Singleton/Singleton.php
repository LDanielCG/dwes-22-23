<?php

    class Config{
        public $NombreApp;

        private static $instance;

        public static function singleton(){
            if (!isset(self::$instance)) {
                self::$instance = new Config();
            }
            return self::$instance;
        }

        private function __construct() {}
        
        function getNombre(){
            return $this->NombreApp;
        }
        function setNombre($nombre){
            $this->NombreApp = $nombre;
        }

    }

    $obj1 = Config::singleton();
    $obj2 = Config::singleton();

        $obj1->setNombre("Nombre1");
        $obj2->setNombre("Nombre2");
        
        echo $obj1->getNombre();
        echo $obj2->getNombre();
?>