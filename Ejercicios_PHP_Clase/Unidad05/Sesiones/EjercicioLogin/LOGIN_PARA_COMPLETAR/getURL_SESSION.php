<?php
    session_start();
    $url = @end(explode('/', $_SERVER['REQUEST_URI']));
    $_SESSION['url'] = $url;
?>