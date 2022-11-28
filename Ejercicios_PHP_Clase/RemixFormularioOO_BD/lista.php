<?php
    spl_autoload_register(function($class) {
        $path = "./";
        $file = str_replace('\\', '/', $class);
        require("$path${file}.php");
    });
    use Formulario\claseBD;

    //Conexión con la BBDD.
    $dsn = 'mysql:host=localhost;dbname=examen';
    $user = $passwd = "examen";
    $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
    $baseDeDatos = new claseBD($dsn, $user, $passwd,$options);

    //$select = $baseDeDatos->seleccionarTodo();
    $select = $baseDeDatos->seleccionarTodoSinContrasena();

    if(isset($_POST["delete"]) && isset($_POST["id"])){
        $dlh = $baseDeDatos->eliminarFilas($_POST["id"]);

        header("Location: ./lista.php?success=true");

        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listado de usuarios</title>
    <link rel="stylesheet" href="./CSS/lista.css">
</head>
<body>
    <form action="" method="POST">
        <?php if(@$_GET["success"]){ ?>
            <p>Fila(s) borrada(s) correctamente.</p>
        <?php } ?>
        <?php if(count($select) != 0){ ?>
            <table border>
                <caption>Lista de usuarios</caption>
                <tr>
                    <th>🗑</th>
                    <?php foreach($select[0] as $key => $value){ ?>
                        <th><?=ucfirst($key)?></th>
                    <?php } ?>
                </tr>
                <?php foreach ($select as $fila){ ?>
                    <tr>
                        <?php foreach($fila as $columna => $dato){ 
                            if($columna == "id") { ?>
                                <td><input type="checkbox" name="<?=$columna?>[]" value="<?=$dato?>"></td>
                                <td><?=$dato?></td>
                        <?php }else{ ?>
                                <td><?=$dato?></td>
                             <?php } ?>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </table>
        <?php }else { ?>
            <h2>No hay usuarios.</h2>
        <?php } ?>
        <input type="submit" name="delete" value="Borrar seleccionados">
        <a href="index.php">Volver</a>
    </form>
</body>
</html>