<?php
    include("defaultValues.php");
?>
<style>
    body {
        background-color: <?=$BG?>;
        color: <?=$FG?>;
    }

    form {
        border: 2px solid black;
        width: fit-content;
        padding: 10px;
        background-color: rgba(189, 189, 189, 0.5);
    }
    .cont, form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    label {
        margin: 5px;
    }

    .menu {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        position: fixed;
        bottom: 0;
        left: 0;
        border: 2px solid grey;
        border-left: 0;
        border-right: 0;
        width: 100%;
    }
    .menu .active {
        background-color: grey;
    }
    .menu a {
        background-color: rgba(189, 189, 189, 0.5);
        color: <?=$FG?>;
        padding: 15px;
        width: 150px;
        text-align: center;
        text-decoration: none;
        transition: 0.3s;
    }
    .menu a:hover {
        background-color: rgba(124, 124, 124, 0.5);
        padding: 15px;
        width: 150px;
        text-align: center;
        text-decoration: none;
    }
</style>