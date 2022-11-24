<?php
    // Prepare
    $stmt = $mbd->prepare("INSERT INTO Clientes (nombre, ciudad) VALUES (?, ?)");
    // Bind
    $nombre = "Peter";
    $ciudad = "Madrid";
    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $ciudad);
    // Excecute
    $stmt->execute();
    // Bind
    $nombre = "Martha";
    $ciudad = "Cáceres";
    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $ciudad);
    // Execute
    $stmt->execute();
?>