<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Ej4.php?valor=estoy&act=recorriendo&un=array -->
    <table border>
        <tr><th>Clave</th><th>Valor</th></tr>
    <?php foreach($_GET as $key => $value){ ?>
        <tr>
            <td><?php echo $key ?></td>
            <td><?php echo $value ?></td>
        </tr>
    <?php }?>
    </table>
</body>
</html>