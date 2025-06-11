<?php
require_once "main.php";
    $pdo = conexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = limpiar_cadena($_POST['usuario_id']);

    //try {
    /*$stmt = $pdo->prepare("DELETE FROM facturas WHERE persona_id = :id");
    $stmt->execute([
    ':id' => $proveedor_id]);*/

    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $stmt->execute([
    ':id' => $usuario
    ]);
//}
        /*header("Location: ../index.php?vistas=Inicio&mensaje=eliminar_proveedor_exito");
        exit;
    } catch (Exception $e) {

        header("Location: ../index.php?vistas=Inicio&mensaje=eliminar_error");
        exit;
    }*/
}
$pdo = null;

?>