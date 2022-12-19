<?php
    include('./getURL_SESSION.php');

    if( !isset($_SESSION['user']) ){
        header('Location: login.php?error=Acceso denegado&url='.$url);
        exit;
    }

    print_r($_SESSION);
?>