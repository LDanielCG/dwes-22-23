<?php
    require_once("claseBD.php");
    use Ejercicio3\claseBD;

    //Conexión con la BBDD.
    $dsn = 'mysql:host=localhost;dbname=examen';
    $user = $passwd = "examen";
    $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
    $baseDeDatos = new claseBD($dsn, $user, $passwd,$options);

    $select = $baseDeDatos->seleccionarTodo();

    //Comprobar si se quiere borrar datos y qué datos se quieren borrar.
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
                        <?php   foreach($fila as $columna => $dato){ 
                                    if($columna == "id") { ?>
                                        <td><input type="checkbox" name="<?=$columna?>[]" value="<?=$dato?>"></td>
                                        <td><?=$dato?></td>
                        <?php       }else{
                                        if(gettype($dato) == "integer"){ ?>
                                            <td><?=date("Y-m-d H:i:s",$dato)?></td>
                        <?php           }else{ ?>
                                            <td><?=$dato?></td>
                        <?php           }
                                    }
                                } 
                        ?>
                    </tr>
                <?php } ?>
            </table>
            <input type="submit" name="delete" value="Borrar seleccionados">
        <?php }else { ?>
            <h2>No hay usuarios.</h2>
        <?php } ?>
        <a href="index.php">Volver</a>
    </form>
</body>
</html>