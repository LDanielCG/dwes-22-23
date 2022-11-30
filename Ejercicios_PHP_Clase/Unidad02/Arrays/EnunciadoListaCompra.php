<?php
    $productos = [
        "naranja" => 1.2,
        "manzana" => 1.5,
        "pera" => 1.8,
        "platano" => 1.1,
        "kiwi" => 2,
        "macarrones" => 0.5,
        "arroz" => 0.75,
        "salchichas" => 1
    ];

    function imprimirLista($productos) { 
?>
        <form action="" method="get">
<?php
        $numProds = 0;
        $precioTotal = 0;
        foreach($productos as $nomFruta => $precFruta){   
            if(isset($_GET[$nomFruta]) != 0) {
                $numProds = $_GET[$nomFruta];
            }      
            echo '<input type="number" min="0" max="15" value="'. $numProds .'" name="'. $nomFruta .'"> ' . '<label>' . $nomFruta . ': ' . $precFruta . ' €</label><br/>';
                        
            if(@$_GET[$nomFruta] != 0){
                echo '<p class="resultado">x'.$numProds. ' ' .$nomFruta.': ' . ($precFruta*$numProds) . ' €</p>';
                $precioTotal += ($precFruta*$numProds);
            }
        }
?>
            <input type="submit" value="Generar facutra">
        </form>
        <h3>Precio total de la compra: <?php echo $precioTotal ?> €</h3>
<?php } ?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        .resultado{
            padding: 5px;
            margin:5px 25px;
            background-color: antiquewhite;
            border: 1px solid black;
            width:fit-content;
        }

        label{
            padding: 5px;
            margin: 5px;
        }
        input{
            padding: 2px;
            margin:5px;
        }

    </style>
</head>
<body>
    <?php echo imprimirLista($productos);?>
</body>
</html>