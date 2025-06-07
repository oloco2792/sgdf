<?php
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

?>