<?php
echo "<h3>PDO =========== testConnectionPDO.php</h3>";

try {
    $mbd = new PDO('mysql:host=localhost;dbname=basededatosclase', "alumno", "alumno");

    // Utilizar la conexión aquí
    $resultado = $mbd->query('SELECT * FROM Ciclistas');

    echo "<table border><tr>";
    $i = 0;
    foreach ($resultado as $fila){
        $keys=array_keys($fila);
        if($i%2 == 0){
            echo "<th>$keys[$i]</th>";
        }
        $i++;
    }
    echo "</tr><tr>";
    foreach($resultado as $fila){
        foreach($fila as $key => $value){
            echo "<td>$key</td>";
        }
    }
    echo "</tr></table>";




    // Ya se ha terminado; se cierra
    $resultado = null;
    $mbd = null;

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "\n";
    die();
}

?>