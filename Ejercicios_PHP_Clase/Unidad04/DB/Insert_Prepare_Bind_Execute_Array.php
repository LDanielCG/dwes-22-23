<?php
    // Prepare:
    $stmt = $dbh->prepare("INSERT INTO Clientes (nombre, ciudad) VALUES (:nombre, :ciudad)");
    $nombre = "Luis";
    $ciudad = "Barcelona";
    // Bind y execute:
    if($stmt->execute(array(':nombre'=>$nombre, ':ciudad'=>$ciudad))) {
        echo "Se ha creado el nuevo registro!";
    }
?>