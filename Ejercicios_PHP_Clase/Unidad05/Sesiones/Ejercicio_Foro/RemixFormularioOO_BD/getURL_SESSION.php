<?php
    $url = @end(explode('/', $_SERVER['REQUEST_URI']));
    $_SESSION['url'] = $url;
?>