<?php
    session_start();
    if( !isset($_SESSION['user']) ){
        $url = @end(explode('/', $_SERVER['REQUEST_URI']));
        setcookie("url",$url);
        header('Location: login.php?error='.$url);
        exit;
    }
    print_r($_SESSION);
?>