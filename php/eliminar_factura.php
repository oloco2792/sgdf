<?php
require_once "main.php";
    $pdo = conexion();

    $deuda_id = limpiar_cadena($_POST['deuda_id']);

    $stmt = $pdo->prepare("DELETE FROM facturas WHERE id = :id");
    $stmt->execute([
    ':id' => $deuda_id
    ]);

    	header("Location: index.php?vistas=home")

    $pdo = null;

?>