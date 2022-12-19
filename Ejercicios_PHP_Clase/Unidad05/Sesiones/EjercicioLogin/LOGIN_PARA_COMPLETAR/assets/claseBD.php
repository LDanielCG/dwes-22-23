<?php
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

        function seleccionarTodo(){
            $stmt = self::$instance->prepare("SELECT * FROM usuarios");
            $stmt->execute();

            return $stmt->fetchAll();
        }

        function eliminarFilas($post){
            $stmt = self::$instance->prepare(
                sprintf("DELETE FROM usuarios WHERE id IN (%s)",
                implode(",", array_fill(0, count($post), "?")))
            );
            $stmt->execute($post);
        }

        function buscarPorMail($post){
            $stmt = self::$instance->prepare
            ("SELECT * FROM usuarios WHERE email LIKE :email");

            $email = "%".$post."%";
            $stmt->bindParam(':email', $email);

            $stmt->execute();
            return $stmt->fetchAll();
        }

        public static function getInstance(){return self::$instance;}
    }
?>