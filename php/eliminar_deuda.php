<?php
session_start(); // Asegúrate de iniciar la sesión

require_once "main.php";

$pdo = conexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $deuda_id = limpiar_cadena($_POST['deuda_id']);

    try {
        /**
        $stmt = $pdo->prepare("DELETE FROM deudas WHERE id = :id");
        $stmt->execute([':id' => $deuda_id]);
        **/

        $_SESSION['mensaje'] = "¡La deuda ha sido eliminada correctamente!";
        $_SESSION['mensaje_tipo'] = "exito";

        header("Location: ../index.php?vistas=Inicsio");
        exit;
    } catch (Exception $e) {
        $_SESSION['mensaje'] = "Hubo un problema al eliminar la deuda.";
        $_SESSION['mensaje_tipo'] = "error";

        header("Location: ../index.php?vistas=Iniciso");
        exit;
    }
}
$pdo = null;

/**
require_once "main.php";
    $pdo = conexion();

    $deuda_id = limpiar_cadena($_POST['deuda_id']);

    $stmt = $pdo->prepare("DELETE FROM deudas WHERE id = :id");
    $stmt->execute([
    ':id' => $deuda_id
    ]);

    if(isset($deuda_id)){
        echo "<div class='mensaje_exito'>
            <p class='mensaje_exito__p'>El Registro se ha modificado correctamente.</p>
        </div>";

        header("Location: index.php?vistas=home");
    }else{
        echo "<div class='mensaje_exito'>
            <p class='mensaje_exito__p'>El Registro se ha modificado correctamente.</p>
        </div>";
    }

    $pdo = null;
**/
?>