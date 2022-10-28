<?php
    spl_autoload_register(function ($class) {
        $classPath = "./";
        echo "Autoload llamado <br/>";
        require("$classPath${class}.php");
    });

    $p = new Product();
    echo $p->id;
?>