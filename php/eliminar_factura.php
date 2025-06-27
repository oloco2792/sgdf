<?php
require_once "main.php";

$pdo = conexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $factura_id = limpiar_cadena($_POST['factura_id']);

    try {
        $stmt = $pdo->prepare("DELETE FROM facturas WHERE id = :id");
        $stmt->execute([
        ':id' => $factura_id
        ]);

        header("Location: ../index.php?vistas=Inicio&mensaje=eliminar_factura_exito");
        exit;
    } catch (Exception $e) {

        header("Location: ../index.php?vistas=Inicio&mensaje=eliminar_factura_error");
        exit;
    }
}

?>