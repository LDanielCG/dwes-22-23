<?php
    session_start();
    if( !isset($_SESSION['user']) ){
        $url = @end(explode('/', $_SERVER['REQUEST_URI']));
        $_SESSION['url'] = $url;
    }
    print_r($_SESSION);
?>