<?php
    namespace Ejercicio3;
    class claseBD {
        private static $instance;

        function __construct($dsn,$user,$pass,$options){
            if(!isset(self::$instance)){
                try{
                    self::$instance = new \PDO($dsn,$user,$pass,$options);

                } catch (\PDOException $e) {
                    print "¡Error!: " . $e->getMessage() . "\n";
                    die();
                }
            }
        }


        function insertarValores($log){
            $stmt = self::$instance->prepare("INSERT INTO Logs (
                navegador,
                timestamp
            ) VALUES (
                :navegador,
                :timestamp
            )");

            $stmt->execute([
                ":navegador" => $log["naveg"],
                ":timestamp" => $log["fecha"]
            ]);
        }


        function seleccionarTodo(){
            $stmt = self::$instance->prepare("SELECT * FROM Logs");
            $stmt->execute();

            return $stmt->fetchAll();
        }

        function eliminarFilas($post){
            $stmt = self::$instance->prepare(
                sprintf("DELETE FROM Logs WHERE id IN (%s)",
                implode(",", array_fill(0, count($post), "?")))
            );
            $stmt->execute($post);
        }

        public static function getInstance(){return self::$instance;}
    }
?>