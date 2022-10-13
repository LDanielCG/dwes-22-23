<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        function concatenar(...$cadenas){
            $con = "";
            $sep = $cadenas[0];

            foreach($cadenas as $key => $cadena){
                if($key != 0){
                    if($key != count($cadenas)-1){
                        $con .= $cadena . $sep;
                    }else{
                        $con .= $cadena;
                    }
                }
            }
            return $con;
        }
        
        echo concatenar("/","Hola", "que", "tal","probando","cadenas");
    ?>
</body>
</html>