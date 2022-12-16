<?php
    $BG = (isset($_SESSION['BG']))?$_SESSION['BG']:"white";
    $FG = (isset($_SESSION['FG']))?$_SESSION['FG']:"black";
    $NAME = (isset($_SESSION['NAME']) && $_SESSION['NAME'] != "")?$_SESSION['NAME']:"Anónimo";
?>