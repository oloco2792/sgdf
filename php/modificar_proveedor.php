<?php
require_once "main.php";

    $pdo = conexion();

    $proveedor_id = limpiar_cadena($_POST['proveedor_id']);
    $razon_social = limpiar_cadena($_POST['razon_social']);
    $rif = limpiar_cadena($_POST['rif']);

    if ($razon_social == "" || $rif == "") {
        echo "<div class='mensaje_error'>
        <p class='mensaje_error__p'>Uno de los campos obligatorios no ha sido llenado</p>
        </div>";
    exit();
    }

    if (verificar_datos("[0-9]{1,40}", $rif)) {
        echo "El RIF no coincide con el formato solicitado";
        exit();
    }

        if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $razon_social)) {
        echo "<div class='mensaje_error'>
        <p class='mensaje_error__p'>El Nombre/Razon Social no coincide con el formato solicitado</p>
        </div>";
        exit();
    }


    $stmt = $pdo->prepare("UPDATE proveedores SET
    razon_social = :razon_social,
    rif = :rif
    WHERE id = :id");
    $stmt->execute([
    ':razon_social' => $razon_social,
    ':rif' => $rif,
    ':id' => $proveedor_id
    ]);

    echo "<div class='mensaje_exito'>
        <p class='mensaje_exito__p'>El Registro se ha modificado correctamente.</p>
    </div>";
    $pdo = null;

?>