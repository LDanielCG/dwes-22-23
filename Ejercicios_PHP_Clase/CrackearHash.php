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
    $pass = '';
        $inicio = 97;
        $fin = 122;
        $exito;
            for($i = $inicio; $i <= $fin; $i++ ) {
                for($j = $inicio; $j <= $fin; $j++ ){
                    for($k = $inicio; $k <= $fin; $k++ ){
                        for($l = $inicio; $l <= $fin; $l++ ){
                            $pass = chr($i).chr($j).chr($k).chr($l);
                            $exito = password_verify($pass,$hash);
                            if ($exito == 1){
                                echo "La contraseña es: ". $pass;
                            }
                        }
                    }
                }
            }

            
        
    ?>
</body>
</html>