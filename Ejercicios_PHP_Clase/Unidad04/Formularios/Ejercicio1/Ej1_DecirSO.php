<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Haz una página que diga cuál es el sistema operativo del cliente 
    y desde qué dirección ip lo está haciendo. -->
    <?php
        // print_r($_SERVER); echo "<hr>";
        $sisOP = str_replace('"', '', $_SERVER["HTTP_SEC_CH_UA_PLATFORM"]);
        $dirIP = $_SERVER["REMOTE_ADDR"];
        $navPos = strpos($_SERVER["HTTP_SEC_CH_UA"],";");
        $navegador = str_replace('"','', substr($_SERVER["HTTP_SEC_CH_UA"] ,0,$navPos));

        /*
        $navPosMoz = strpos($_SERVER["HTTP_USER_AGENT"],"/");
        $navegadorMoz = substr($_SERVER["HTTP_USER_AGENT"] ,0,$navPos);
        $sisOPMozPos1 = strpos($_SERVER["HTTP_USER_AGENT"],";");
        $sisOPMozPos2 = strpos(substr($_SERVER["HTTP_USER_AGENT"],$sisOPMozPos1,sizeof($_SERVER["HTTP_USER_AGENT"]))," ");
        $sisOPMoz = substr($_SERVER["HTTP_USER_AGENT"] ,$sisOPMozPos1,$sisOPMozPos2);*/

        $langPos = strpos($_SERVER["HTTP_ACCEPT_LANGUAGE"],",");
        $lang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,$langPos);

        if($lang == "en-US"){
            echo "You're using a <b>".$sisOP."</b> operating system";
            echo " from this IP address: <b>".$dirIP."</b>";
            echo " with a <b>".$navegador."</b> web browser.";
        } else if($lang == "es-ES"){
            echo "Estas usando el sistema operativo <b>". $sisOP ."</b>";
            echo " desde la dirección IP <b>". $dirIP ."</b>";
            echo " con el navegador <b>". $navegador ."</b>";
        } else if($lang == "ja"){
            echo $navegador." ブラウザーで IP アドレス ".$dirIP." の ".$sisOP." オペレーティング システムを使用しています。";
        }

    ?>
</body>
</html>