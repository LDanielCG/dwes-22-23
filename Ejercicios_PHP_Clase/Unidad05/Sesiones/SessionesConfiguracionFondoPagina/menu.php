<?php
    include("defaultValues.php");
    $url = @end(explode('/', $_SERVER['REQUEST_URI']));
    //echo $url;
?>
<div class="menu">
    <a href="pagina1.php" <?= ($url == "pagina1.php")?"class='active'":""?> >Página 1</a>
    <a href="pagina2.php" <?= ($url == "pagina2.php")?"class='active'":""?> >Página 2</a>
    <a href="config.php" <?= ($url == "config.php")?"class='active'":""?> >Config</a>
    <p><?=$NAME?></p>
</div>