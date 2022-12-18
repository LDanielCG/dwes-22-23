<?php
    session_start();
    if( !isset($_SESSION['user']) ){
        header('Location: publico.php');
        exit;
    }else{
        unset($_SESSION['user']);
        header('Location: publico.php');
        exit;
    }
?>