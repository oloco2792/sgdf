<?php
require_once "main.php";

    $pdo = conexion();

    $proveedor_id = limpiar_cadena($_POST['proveedor_id']);
    $razonSocial = limpiar_cadena($_POST['razonSocial']);
    $rif = limpiar_cadena($_POST['rif']);

    if (verificar_datos("[0-9]{1,40}", $rif)) {
        echo "El Rif no coincide con el formato solicitado";
        exit();
    }

        if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $razonSocial)) {
        echo "<div class='mensaje_error'>
        <p class='mensaje_error__p'>El Nombre/Razon Social no coincide con el formato solicitado</p>
        </div>";
        exit();
    }

    $stmt = $pdo->prepare("UPDATE proveedores SET
    razonSocial = :razonSocial,
    rif = :rif
    WHERE id = :id");
    $stmt->execute([
    ':razonSocial' => $razonSocial,
    ':rif' => $rif,
    ':id' => $proveedor_id
    ]);

    echo "<div class='mensaje_exito'>
        <p class='mensaje_exito__p'>El Registro se ha modificado correctamente.</p>
    </div>";
    $pdo = null;

?>