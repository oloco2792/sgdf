<?php
require_once "main.php";
    $pdo = conexion();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = limpiar_cadena($_POST['usuario_id']);

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id LIMIT 1");
    $stmt->execute([
    ':id' => $usuario
    ]);

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if($resultado){
        header("Location: ../index.php?vistas=Inicio&mensaje=eliminar_usuario_activo");
    }else{
        try {

    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $stmt->execute([
    ':id' => $usuario
    ]);

        header("Location: ../index.php?vistas=Inicio&mensaje=eliminar_usuario_exito");
        exit;
    } catch (Exception $e) {

        header("Location: ../index.php?vistas=Inicio&mensaje=eliminar_error");
        exit;
    }
        }
    }
    
$pdo = null;

?>