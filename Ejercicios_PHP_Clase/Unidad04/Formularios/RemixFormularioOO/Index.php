<?php
    spl_autoload_register(function($class) {
        $path = "./";
        $file = str_replace("\\", "/", $class);
        echo $path." ".$file;
        require("$path${file}.php");
    });

    if (isset($_POST["submit"])) {

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormularioRemix</title>
</head>
<body>
    
    <form action="index.php" method="post">
        <h2>Regstrar en remix</h2>
        <div>
            <?php ?>
        </div>
    </form>


</body>
</html>
