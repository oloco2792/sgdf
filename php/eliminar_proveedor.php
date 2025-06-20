<?php
require_once "main.php";
    $pdo = conexion();

if($_SESSION['nivel']==1){
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $persona_id = limpiar_cadena($_POST['persona_id']);

    try {
    $stmt = $pdo->prepare("DELETE FROM deudas WHERE persona_id = :id");
    $stmt->execute([
    ':id' => $persona_id]);

    $stmt = $pdo->prepare("DELETE FROM personas WHERE id = :id");
    $stmt->execute([
    ':id' => $persona_id
    ]);

        header("Location: ../index.php?vistas=Inicio&mensaje=eliminar_persona_exito");
        exit;
    } catch (Exception $e) {

        header("Location: ../index.php?vistas=Inicio&mensaje=eliminar_deuda_error");
        exit;
    }
}
}else{
    header("Location: ../index.php?vistas=Inicio");
    exit;
}

?>