<?php
require_once "main.php";
    $pdo = conexion();

    $persona_id = limpiar_cadena($_POST['persona_id']);

    $stmt = $pdo->prepare("DELETE FROM deudas WHERE persona_id = :id");
    $stmt->execute([
    ':id' => $persona_id
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

    $stmt = $pdo->prepare("DELETE FROM personas WHERE id = :id");
    $stmt->execute([
    ':id' => $persona_id
    ]);

    $pdo = null;

?>