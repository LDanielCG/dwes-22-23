<?php
    $BG = (isset($_COOKIE['BG']))?$_COOKIE['BG']:"white";
    $FG = (isset($_COOKIE['FG']))?$_COOKIE['FG']:"black";
    $NAME = (isset($_COOKIE['NAME']) && $_COOKIE['NAME'] != "")?$_COOKIE['NAME']:"Anónimo";
?>