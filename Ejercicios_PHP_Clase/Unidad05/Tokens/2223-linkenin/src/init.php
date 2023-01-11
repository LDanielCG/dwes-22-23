<?php

require("config.php");
require("DWESBaseDatos.php");

$DB=DWESBaseDatos::obtenerInstancia();
$DB->inicializa(
    $CONFIG['bd_name'],
    $CONFIG['bd_user'],
    $CONFIG['db_pass'],
);


?>