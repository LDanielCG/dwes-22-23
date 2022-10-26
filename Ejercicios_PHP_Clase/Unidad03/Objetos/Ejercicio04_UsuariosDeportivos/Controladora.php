<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 Usuarios - Luis Daniel Casado Guimaraes</title>
</head>
<body>
<?php
    require_once("Usuario.php"); 
    require_once("UsuarioAdministrador.php"); 
    require_once("UsuarioPremium.php");


    $us1 = new Usuario("PP","P2","Futbol");
   /*
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    
    
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");


    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("empate");

    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");

    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");

    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("victoria");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");
    $us1->introducirResultado("derrota");

    $us1->imprimirInformacion();
    */

    $us2 = new UsuarioPremium("PremUsu","ApeUs2","Tenis");
    $us2->introducirResultado("victoria");
    $us2->introducirResultado("victoria");
    $us2->introducirResultado("victoria");
    $us2->introducirResultado("victoria");
    $us2->introducirResultado("victoria");

    $us2->introducirResultado("derrota");
    $us2->introducirResultado("derrota");
    $us2->introducirResultado("derrota");
    $us2->introducirResultado("derrota");
    $us2->introducirResultado("derrota");
    $us2->introducirResultado("derrota");


    $us3 = new UsuarioAdministrador("AdmUsu","ApeUs3","Baloncesto");
    $us3->crearPartido();
?>
</body>
</html>