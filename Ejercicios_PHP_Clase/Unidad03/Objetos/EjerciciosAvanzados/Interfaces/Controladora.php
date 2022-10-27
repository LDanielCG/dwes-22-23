<?php
    require_once("PlataformaPago.php");
    require_once("BancoMalvado.php");
    require_once("BitCoinConan.php");  
    require_once("BancoMaloMalisimo.php"); 

    $obj1 = new BancoMalvado();
    $obj2 = new BitCoinConan();
    $obj3 = new BancoMaloMalisimo(); 

    $arr = [
        $obj1,
        $obj2,
        $obj3
    ];

    $arr[rand(0,2)]->pagar("aaa",10);
    $arr[rand(0,2)]->pagar("aaa",10);
    $arr[rand(0,2)]->pagar("aaa",10);
?>