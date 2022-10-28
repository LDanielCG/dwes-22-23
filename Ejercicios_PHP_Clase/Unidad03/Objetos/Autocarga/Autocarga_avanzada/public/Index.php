<?php
    spl_autoload_register(function ($class) {
        $classPath = "../src/";
        $file = str_replace('\\', '/', $class);
        require("$classPath${file}.php");
    });

    $p = new App1\Product();
    $u = new App2\User();
    echo $p->id . "    ".$u->id;

?>