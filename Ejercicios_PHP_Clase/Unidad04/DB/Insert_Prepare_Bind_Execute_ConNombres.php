<?php
    // Prepare
    $stmt = $mbd->prepare("INSERT INTO Clientes (nombre, ciudad) VALUES (:nombre, :ciudad)");
    // Bind
    $nombre = "Charles";
    $ciudad = "Valladolid";
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':ciudad', $ciudad);
    // Excecute
    $stmt->execute();
    // Bind
    $nombre = "Anne";
    $ciudad = "Lugo";
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':ciudad', $ciudad);
    // Execute
    $stmt->execute();
?>