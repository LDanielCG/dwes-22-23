<?php
    spl_autoload_register(function($class) {
        $path = "./";
        $file = str_replace('\\', '/', $class);
        require("$path${file}.php");
    });
    use Formulario\claseBD;


    $dsn = 'mysql:host=localhost;dbname=examen';
    $user = $passwd = "examen";
    $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
    $baseDeDatos = new claseBD($dsn, $user, $passwd,$options);

    $select = $baseDeDatos->selectAll();






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
        <?php if($select->rowCount() != 0){ ?>
            <table border>
                <caption>Lista de usuarios</caption>
                <tr>
                    <?php foreach($select[0] as $key => $value){ ?>
                        <th><?=$key?></th>
                    <?php } ?>
                </tr>
                <?php foreach ($select as $fila) { ?>
                    <tr>
                        <?php foreach($fila as $columna){ ?>
                            <td><?=$columna?></td>
                        <?php } ?>
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