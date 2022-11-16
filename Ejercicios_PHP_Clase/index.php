<?php 
    $mydir = '.';
    function directory($mydir){
        if ($mydir == '.') {
            $files = array_diff(scandir($mydir),array('.','..','index.php','css','.git', 'back.php'));
        } else {
            $files = array_diff(scandir($mydir),array('.','..','css','.git', 'back.php'));
        }
?>
    <ul>
        <?php 
            foreach($files as $file) :
                if(is_dir($mydir."/".$file)) :
        ?>
                    <li>
                        <input type="checkbox" id="checkbox-<?= 
                        str_replace(array(".","/"),array("home","-"),$mydir)."-".$file?>">

                        <label for="checkbox-<?= 
                        str_replace(array(".","/"),array("home","-"),$mydir)."-".$file?>"><b><?= $file ?></b></label>

                        <?php directory($mydir."/".$file); ?>
                    </li>
        <?php   else : ?>
                    <li><a href="<?= $mydir."/".$file ?>"><?= $file ?></a></li>
        <?php   endif;
            endforeach;
        ?>
    </ul>

<?php } ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>  
        <header>
            <h2>Luis Daniel Casado Guimaraes - DAW2V</h2>
        </header>
        <main>
            <h3>Listado</h3>
            <div class="list">
                <?php
                    directory($mydir);
                ?>
            </div>
        </main>
</body>
</html>