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

    private static $numeroCuentaCont = 100001;
    private $numeroCuenta;
    private $nombre;
    private $saldo;


    function __construct($nombre = 'anonimo',$saldo = 0){
        $this->numeroCuenta = self::$numeroCuentaCont++;
        $this->nombre = $nombre;
        $this->saldo = $saldo;
    }

    function getNum(){
        return $this->numeroCuenta;
    }



    function ingresar($dinero){
        $this->saldo += $dinero;
    }

    function retirar($dinero){
        $this->saldo -= $dinero;
    }

    function saldo(){
        return $this->saldo;
    }

    function transferirA($cuenta,$cantidad){
        $this->retirar($cantidad);
        $cuenta->ingresar($cantidad);
    }

    function unirCon($cuenta){
        $this->ingresar($cuenta->saldo()); //se añade el saldo de la cuenta a esta.
        $cuenta->retirar($cuenta->saldo()); //el saldo de la cuenta antigua se queda a 0
        $cuenta->numeroCuenta = -1;
    }

    function bancarrota(){
        $this->retirar($this->saldo());
    }

    function mostrar(){
        echo 
        "<div class='infoCont'>
            <span>$this->numeroCuenta</span>
            <span>$this->nombre</span>
            <span>$this->saldo</span>
        </div>";
    }



}
//Crea una página con tres cuentas:

// Milloneti, saldo 1000000
// Agapito, saldo 30345
// Pobretón, saldo -10000

// Haz que el Milloneti tenga 100 retiradas de 1000 euros 
//Haz que Agapito tenga un ingreso de 1200 euros.
//Muestra el saldo de las 3 cuentas. Solo el saldo. 
//Pobretón ha hackeado el banco y ha conseguido unir la cuenta del Milloneti a la suya. 
//Agapito es buena persona y decide transferir la mitad de su salario a Milloneti para que rehaga su vida. 
//Muestra el detalle (método mostrar) de las 3 cuentas.

$cuentaDefault = new CuentaBancaria();
echo "<br/>";
echo $cuentaDefault->mostrar();
echo "<br/><br/>";

$cuentaA = new CuentaBancaria('Milloneti',1000000);
$cuentaB = new CuentaBancaria('Agapito',30345);
$cuentaC = new CuentaBancaria('Pobretón',-10000);


    for($i = 1; $i <= 100; $i++){
        $cuentaA->retirar(1000);
    }
    $cuentaB->ingresar(1200);

    echo "CuentaA: ";
    echo $cuentaA->saldo();
    echo "<br/>";
    echo "CuentaB: ";
    echo $cuentaB->saldo();
    echo "<br/>";
    echo "CuentaC: ";
    echo $cuentaC->saldo();
    echo "<br/><br/>";
    echo $cuentaC->unirCon($cuentaA);
    echo $cuentaB->transferirA($cuentaA,(($cuentaB->saldo())/2));
    echo "<br/><br/>";
    echo "CuentaA: ";
    echo $cuentaA->mostrar();
    echo "<br/>CuentaB: ";
    echo $cuentaB->mostrar();
    echo "<br/>CuentaC: ";
    echo $cuentaC->mostrar();


?>
</body>
</html>