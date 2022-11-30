<?php
    spl_autoload_register(function($class) {
        $path = "./";
        $file = str_replace('\\', '/', $class);
        require("$path${file}.php");
    });


    $formulario = Formulario\ControladorUsuario::singleton();
    $formulario->crearCampos($_POST);
    $claves = $formulario->getKeys();

    $fh = Formulario\claseFileCSV::singleton();
    $csv = $fh->getCSV();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listado de pedidos</title>
    <link rel="stylesheet" href="./CSS/lista.css">
</head>
<body>
    <div>
        <?php if(!empty($csv)){ ?>
            <table border>
                <caption>Lista de pedidos</caption>
                <tr>
                    <?php foreach($claves as $clave){ ?>
                            <td><?=ucfirst($clave)?></td>
                    <?php } ?>
                </tr>
                <?php foreach(explode("\n", $csv) as $linea) { ?>
                    <tr>
                        <?php if(!empty($linea)){
                            foreach (explode(",", $linea) as $valor){ ?>
                                <td><?=$valor?></td>
                            <?php }
                        } ?>
                    </tr>
                <?php } ?>
            </table>
        <?php }else { ?>
            <h2>No hay pedidos.</h2>
        <?php } ?>
        <a href="index.php">Volver</a>
    </div>
</body>
</html>