<?php
require_once "main.php";
    $pdo = conexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $proveedor_id = limpiar_cadena($_POST['proveedor_id']);

    try {
    $stmt = $pdo->prepare("DELETE FROM facturas WHERE proveedor_id = :id");
    $stmt->execute([
    ':id' => $proveedor_id]);

    $stmt = $pdo->prepare("DELETE FROM proveedores WHERE id = :id");
    $stmt->execute([
    ':id' => $proveedor_id
    ]);

        header("Location: ../index.php?vistas=Inicio&mensaje=eliminar_proveedor_exito");
        exit;
    } catch (Exception $e) {

        header("Location: ../index.php?vistas=Inicio&mensaje=eliminar_error");
        exit;
    }
}
$pdo = null;

?>