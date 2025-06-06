<?php
require_once "main.php";

    $pdo = conexion();

    $persona_id = limpiar_cadena($_POST['persona_id']);
    $nombre = limpiar_cadena($_POST['nombre']);
    $apellido = limpiar_cadena($_POST['apellido']);
    $cedula = limpiar_cadena($_POST['cedula']);

    if (verificar_datos("[0-9]{1,40}", $cedula)) {
        echo "El Monto no coincide con el formato solicitado";
        exit();
    }

        if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $nombre)) {
        echo "<div class='mensaje_error'>
        <p class='mensaje_error__p'>El Nombre no coincide con el formato solicitado</p>
        </div>";
        exit();
    }

        if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $apellido)) {
        echo "<div class='mensaje_error'>
        <p class='mensaje_error__p'>El Apellido no coincide con el formato solicitado</p>
        </div>";
        exit();
    }


    $stmt = $pdo->prepare("UPDATE personas SET
    nombre = :nombre,
    apellido = :apellido,
    cedula = :cedula
    WHERE id = :id");
    $stmt->execute([
    ':nombre' => $nombre,
    ':apellido' => $apellido,
    ':cedula' => $cedula,
    ':id' => $persona_id
    ]);

    echo "<div class='mensaje_exito'>
        <p class='mensaje_exito__p'>El Registro se ha modificado correctamente.</p>
    </div>";
    $pdo = null;

?>