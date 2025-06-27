<?php
session_start(); // Asegúrate de iniciar la sesión

require_once "main.php";

$pdo = conexion();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $deuda_id = limpiar_cadena($_POST['deuda_id']);

        try {
            $stmt = $pdo->prepare("DELETE FROM deudas WHERE id = :id");
            $stmt->execute([
            ':id' => $deuda_id
            ]);

            header("Location: ../index.php?vistas=Inicio&mensaje=eliminar_deuda_exito");
            exit;
        } catch (Exception $e) {

            header("Location: ../index.php?vistas=Inicio&mensaje=eliminar_deuda_error");
            exit;
        }
    }

?>