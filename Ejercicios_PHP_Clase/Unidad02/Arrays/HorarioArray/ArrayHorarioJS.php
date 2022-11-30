<?php
    $horario = [
        "Horas" => ["16:00 - 16:55","16:55 - 17:50","17:50 - 18:45","18:45 - 19:10","19:10 - 20:05","20:05 - 21:00","21:00 - 21:55"],
        "Lunes" => ["DWEC","DWEC","DWEC","Recreo","EIE","EIE","Inglés"],
        "Martes" => ["Inglés","DAW","DAW","","DIW","DIW","DIW"],
        "Miercoles" => ["DIW","DIW","DIW","","DWES","DWES","DWES"],
        "Jueves" => ["EIE","DAW","DAW","","DWES","DWES","DWES"],
        "Viernes" => ["DWES","DWES","DWES","","DWEC","DWEC","DWEC"]
    ];

    function print_horario($horario) {
        $i = 0;
        $dias = array_keys($horario);
?>
        <table class="horario">
            <tr>
                <?php foreach ($dias as $dia) : ?>
                    <th><?= $dia ?></th>
                <?php endforeach; ?> 
            </tr>
            <?php
                for ($i=0; $i < count($horario[$dias[array_key_first($dias)]]); $i++) :
                /*
                ya que necesito un indice que apunte a x posicion de cada dia para poder pintarlo teniendo en cuenta que pudiesen ser de diferente longitud
                para ello cuento los modulos del primer dia del array accediendo al primer valor del array $dias donde tengo las claves del array $horario
                eso hara que recorra todos los valores del array del primer dia, en este caso el "Lunes", al final del for para que el valor de $dias uso 
                la funcion next() para que el puntero avance y ponga la segunda posicion del array, y asi sucesivamente...
                */
            ?>
                        <tr>
                            <?php 
                                foreach ($horario as $dia => $modulos) : 

                                    $rowspan = array_count_values($horario[$dia])[$modulos[$i]];
                                    
                                    /* 
                                    array_count devulve un array $clave => $suma
                                       Array = "dia de la semana"        $clave => $suma
                                    ej Array ( [DWES] => 3 [Recreo] => 1 [DWEC] => 3 ) Array ( [DWES] => 3 [Recreo] => 1 [DWEC] => 3 )
                                    como quiero acceder a el valor de un modulo en concreto añado al final de la funcion [$modulo[$i]] que es el modulo que quiero hacer print
                                    */

                                    $modulos = array_unique($modulos);

                                    /*
                                    con array_unique elimino los datos repetidos dentro del array
                                    Array ( [0] => DWEC [3] => Recreo [4] => EIE [6] => Inglés )
                                    Como he eliminado ciertas posiciones el indice es un caos
                                    */

                                    if (!empty($modulos[$i])) :

                                    /*
                                    Como el indice es un caos pero no es igual para cada array de cada dia recorro todas las posiciones comprobando si esta vacio o no, si no lo esta printa el valor y usa la variable rowspan que tiene la suma de horas de ese modulo en concreto
                                    */
                            ?>
                                        <td class="<?= $modulos[$i] ?>" rowspan="<?= $rowspan ?>" style="--index:<?= $rowspan ?>;" <?= ($modulos[$i] == "Recreo")?"colspan='5'":""; ?>><?= $modulos[$i]; ?></td>
                            <?php
                                    endif;
                                endforeach; 
                            ?> 
                        </tr>
            <?php
                    next($dias);
                endfor;
            ?>
        </table>
<?php
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario</title>
    <style>
        :root {
            --cell-height: 45px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        main {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .horario-wrapper {
            display: flex;
            flex-direction: column;
            width: 50%;
            height: 450px;

        }

        .title {
            margin: 12px 0;
        }

        .horario {
            width: 100%;
            /* height: 100%; */
        }

        table, td, th {
            text-align: center;
            border: 1px solid black;
            border-collapse: collapse;
        }

        th {
            width: calc(100%/6);
            height: var(--cell-height);
        }

        td {
            height: calc(var(--index)*var(--cell-height));
        }

        .DWEC {
            background-color: #dfdf82;
        }

        .EIE {
            background-color: #ffff00;
        }

        .Inglés {
            background-color: #ceceff;
        }

        .DAW {
            background-color: #ffd1f7;
        }

        .DIW {
            background-color: #ffe5b4;
        }

        .DWES {
            background-color: #b9b9e4;
        }
    </style>
</head>
<body>
    <main>
        <div class="horario-wrapper">
            <h2 class="title">Horario</h2>
            <?= print_horario($horario) ?>
        </div>
    </main>
</body>
</html>