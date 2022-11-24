<?php

    try {
        $dsn = 'mysql:host=localhost;dbname=basededatosclase';
        $user = $passwd = "alumno";
        $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        $mbd = new PDO($dsn, $user, $passwd,$options);

        if(!isset($_POST['Enviar'])){
            // Utilizar la conexión aquí
            $resultado = $mbd->query('SELECT * FROM Ciclistas');

            imprimirTabla($resultado);
        }else{
            // Prepare
            $stmt = $mbd->prepare("SELECT * FROM Ciclistas WHERE nombre LIKE :nombre");
            // Bind
            $nombre = "%".$_POST["buscar"]."%";
            $stmt->bindParam(':nombre', $nombre);
            // Excecute
            $stmt->execute();
            
            imprimirTabla($stmt);
        }
        
        // Ya se ha terminado; se cierra
        $resultado = null;
        $mbd = null;

    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "\n";
        die();
    }

    function imprimirTabla($consulta) { 
        $tabla = $consulta->fetchAll(); 
        ?>
        <form action="" method="post">
            <label>Buscar: </label>
            <input type="text" name="buscar" id="buscar">
            <button type="submit" name="Enviar" value="enviado">Buscar</button>
        </form>

        <?php 
        if($_POST['buscar'] == ''){
            echo "<table>";
                echo "<tr>";
                    foreach ($tabla[0] as $clave => $valor) { 
                        if (!is_numeric($clave)) {
                            if($clave == 'nombre'){
                                echo "<th>$clave</th>";
                            }
                        }
                    }
                echo "</tr>";
                foreach ($tabla as $fila) {
                    echo "<tr>";
                        foreach ($fila as $clave => $valor) {
                            if (!is_numeric($clave)) {
                                if($clave == 'nombre') {
                                    echo "<td>$valor</td>";
                                }
                            }
                        }
                    echo "</tr>";
                }
            echo "</table>";
        }else {
            echo "<table>";
                echo "<tr>";
                    echo "<td colspan='3'>Detalle de ".$tabla[0]['nombre']."</td>";
                echo "</tr>";
                echo "<tr>";
                    foreach ($tabla[0] as $clave => $valor) { 
                        if (!is_numeric($clave)) {
                            echo "<th>$clave</th>";
                        }
                    }
                echo "</tr>";
            foreach($tabla as $fila) {
                echo "<tr>";
                    foreach ($fila as $clave => $valor) {
                        if (!is_numeric($clave)) {
                            if($clave == "num_trofeos"){
                                echo "<td>";
                                for($i = 0; $i < $valor; $i++){
                                    echo "🏆";
                                }
                                echo " ($valor)</td>";
                            }else{
                                echo "<td>$valor</td>";
                            }
                        }
                    }
                echo "</tr>";
            }
            echo "</table>";
        }
    } ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba BD</title>
    <style>
        body {
            font-family: arial;
        }

        table {
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #333;
            padding: 5px;
            text-align: center;
        }

        tr:first-child {
            background-color: #333;
            color: white;
        }

        tr:nth-child(2n + 3) {
            background-color: #eee;
        }

        td:first-child {
            font-weight: bold;
        }
    </style>
</head>
<body>
    
</body>
</html>