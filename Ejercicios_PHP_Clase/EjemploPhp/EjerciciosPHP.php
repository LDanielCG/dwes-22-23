<?php
    $holaVar = 'Hola Mundo!';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EjerciciosPHP - Luis Daniel</title>
    <style>
        .titulo {
            font-weight: bold;
            display:block;
            color: navy;
            text-shadow: 0 0 2px grey;;
        }
        .cursiva {
            font-style: italic;
        }
        .CurBold {
            font-style: italic;
            font-weight: bold;
        }
        p {
            display: inline-block;
        }

        .circulo {
            background-color: red;
            border-radius: 100%;
        }

        .p_block{
            display:block;
            padding-left:50px;
        }

    </style>
</head>
<body>
    <p class="titulo">Ejercicio 1 - Escriba "Hola mundo!" de forma dinámica con la instrucción echo</p>
        <?php echo 'Hola mundo' ?>
    <p class="titulo">Ejercicio 2 - Escriba "Hola mundo!" usando una variable para almacenar la cadena</p>
        <?php echo $holaVar ?>
    <p class="titulo">Ejercicio 3 - Escriba después de "Hola mundo!" "Esta página ha sido programada por "</p>
        <?php echo $holaVar . ' <p>Esta página ha sido programada por Luis Daniel</p>' ?>
    <p class="titulo">Ejercicio 4 - Modifica la página para que escriba la parte "Esta página..." en cursiva y "" en cursiva y negrita. NOTA: Puedes utilizar el operador "." para concatenar la salida</p>
        <?php echo $holaVar . ' <p><span class="cursiva"> Esta página</span> ha sido programada por <span class="CurBold">Luis Daniel</span></p>' ?> 
    <p class="titulo">Ejercicio 5 - Utilice 3 variables: $nombre, $r, $pi. Al visitar la página establecerá el valor de las variables, escribirá un mensaje de bienvenida y escribirá el área y el perímetro de la circunferencia. NOTA: Utiliza un fichero css para dar estilo a cada parte.</p>
        <?php
            $nombre = 'Daniel';
            $r = 30;
            $pi = M_PI;
            
            echo '<p>Bienvenido '. $nombre .'</p>';
            echo '<div class="circulo" style="width:'.($r*2).'px; height:'.($r*2).'px;"></div>';
            echo '<p>El area de esta cirunferencia es: '. $pi*(pow($r,2)) .' cm2</p>'
        ?>
        


    <p class="titulo">Ejercicio 6 - Declare 2 variables, después produzca la suma, resta, multiplicación, división, resto y muestre la salida de aplicar el operador ++ y -- NOTA: ¿Qué variables hemos definido? print_r(get_defined_vars()); </p>
    <?php
        $var1 = 10;
        $var2 = 20;

        echo '<p class="p_block">Suma: '. ($var1+$var2) .'</p>';
        echo '<p class="p_block">Resta: '. ($var1-$var2) .'</p>';
        echo '<p class="p_block">Multiplicación: '. ($var1*$var2) .'</p>';
        echo '<p class="p_block">División: '. ($var1/$var2) .'</p>';
        echo '<p class="p_block">Operador ++ a VAR1: '. $var1++ .'</p>';
        echo '<p class="p_block">Operador ++ a VAR2: '. $var2++ .'</p>';
        echo '<p class="p_block">Operador -- a VAR1: '. $var1-- .'</p>';
        echo '<p class="p_block">Operador -- a VAR2: '. $var2-- .'</p>';
        
        print_r(get_defined_vars());
        echo '<br/><br/>';

    ?>


    <p class="titulo">Ejercicio 7 - Imprima una pirámide de asteriscos, tamaño definido por una variable $n</p>
    <div style="text-align: center;width: -moz-fit-content;">
    <?php
        $n = 5;
        $piramide = null;
        echo '$n = ' . $n . '<br/><br/>';
        for ($i = 0; $i < $n; $i++) {
            for ($j = $i; $j <= $i; $j++) {
                $piramide .= "*";
            }
            echo $piramide ."<br/>";
        }
    
    ?>
    </div>
  



    <p class="titulo">Ejercicio 8 - Imprima una pirámide de colores NOTA: Utiliza css para definir elementos que tengan ancho fijo y un asterisco en el centro. NOTA2: Utiliza la siguiente función php para pintar colores aleatorios, debes sobrescribir la propiedad background-color del elemento html a través de la etiqueta style.</p>
    <br/><br/><br/>
   
    <div style="text-align: center;width: -moz-fit-content;">
    <?php
       
        $n = 5;
        $piramide = null;
        echo '$n = ' . $n . '<br/><br/>';
        for ($i = 1; $i <= $n; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                echo '<span style="color: rgb(' . rand(0,255) . ',' . rand(0,255) . ',' . rand(0,255) . ');">*</span>';
            }
            echo "<br/>";
        }
    ?>
   </div>


</body>
</html>