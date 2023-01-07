<?php
    session_start();
    if( isset($_SESSION['id_user']) ){ unset($_SESSION['id_user']); }

    $url = (isset($_SESSION['url']))?$_SESSION['url']:"index.php";
    header("Location: ".$url);
    exit;
?>