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
        function sum(...$numbers){
            $acc = 0;
            foreach($numbers as $n){
                $acc += $n;
            }
            return $acc;
        }
        
        echo sum(1, 2, 3, 4);
    ?>
</body>
</html>