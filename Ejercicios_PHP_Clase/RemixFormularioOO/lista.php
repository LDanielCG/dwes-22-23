<?php
    spl_autoload_register(function($class) {
        $path = "./";
        $file = str_replace('\\', '/', $class);
        require("$path${file}.php");
    });


    $config = Formulario\Controlador::singleton();
    $usuarios = $config->recuperarUsuarios();
    $claves = $config->getKeys();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listado de usuarios</title>
    <style>
        tr {
            text-align: center;
        }
    </style>
</head>
<body>
    <div>
        <?php if(!empty($usuarios)){ ?>
            <table border>
                <caption>Lista de usuarios</caption>
                <tr>
                    <?php foreach($claves as $clave){
                        if($clave != $claves[3]){ ?>
                            <td><?=ucfirst($clave)?></td>
                    <?php }
                    } ?>
                </tr>
                <?php foreach ($usuarios as $usuario) { ?>
                    <tr>
                        <td><?= $usuario->getNombre();      ?></td>
                        <td><?= $usuario->getApellidos();   ?></td>
                        <td><?= $usuario->getNumero();      ?></td>
                        <!----- Contraseña no se muestra    ------>
                        <td><?= $usuario->getFecha();       ?></td>
                        <td><?= $usuario->getCorreo();      ?></td>
                        <td><?= $usuario->getSexo();        ?></td>
                        <td><?= $usuario->getCurso();       ?></td>
                        <td><?= $usuario->getEstudios();    ?></td>
                        <td><?= $usuario->getDescripcion(); ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php }else { ?>
            <h2>No hay usuarios.</h2>
        <?php } ?>

        <a href="index.php">Volver</a>
    </div>
</body>
</html>