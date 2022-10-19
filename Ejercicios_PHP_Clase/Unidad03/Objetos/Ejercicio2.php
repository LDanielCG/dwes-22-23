<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

class CuentaBancaria {

    private static $numeroCuenta = 100001;
    private $nombre;
    private $saldo;


    function CuentaBancaria ($nombre = 'anonimo',$saldo = 0){
        $this::$numeroCuenta++;
        $this->$nombre = $nombre;
        $this->$saldo = $saldo;
    }

    function getNum(){
        return $this::$numeroCuenta;
    }


}

$test1 = new CuentaBancaria('Test1',12.5);
$test2 = new CuentaBancaria('Test2',10.1);

echo $test1->getNum();
echo $test2->getNum();


?>
</body>
</html>