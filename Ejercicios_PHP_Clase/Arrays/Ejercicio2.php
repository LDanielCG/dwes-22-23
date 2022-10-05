<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php set_time_limit(0);
    $hash = "$2y$10$0GNiidCkeO/VBBHPH0DP6e5tgz6l/FIOxs1RcFloJrXuTYmmAsW72";
    $gen = "";
    $exito = false;
    $randLet = chr(rand(97,122));
        while (!$exito){
            $gen = password_hash($randLet, PASSWORD_DEFAULT);
            if ($gen == $hash){
                $exito = true;
            }
        }
    ?>
</body>
</html>