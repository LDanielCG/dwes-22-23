<?php
$msg = "Hola soy PHP";
?>
<html>
    <head>
        <title>Hola mundo de php</title>
    </head>
    <body>
        <?php include('menu.html') ?>
        <h1>Hola esto no es php</h1>
        <p>Aquí viene el esperado... <?php echo $msg ?></p>
    </body>
</html>

