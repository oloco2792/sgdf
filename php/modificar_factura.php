<?php
require_once "main.php";
    $pdo = conexion();

    $factura_id = limpiar_cadena($_POST['factura_id']);
    $monto = limpiar_cadena($_POST['monto']);
    $fecha = limpiar_cadena($_POST['fecha']);
    $estado = limpiar_cadena($_POST['estado']);
    $descripcion = limpiar_cadena($_POST['descripcion']);

    if (verificar_datos("[0-9]{1,40}", $monto)) {
        echo "El Monto no coincide con el formato solicitado";
        exit();
    }

    $fecha_formateada = date('Y-m-d', strtotime($fecha));

    $stmt = $pdo->prepare("UPDATE facturas SET
    monto = :monto,
    fecha = :fecha,
    estado = :estado,
    descripcion = :descripcion
    WHERE id = :id");
    $stmt->execute([
    ':monto' => $monto,
    ':fecha' => $fecha_formateada,
    ':estado' => $estado,
    ':descripcion' => $descripcion,
    ':id' => $factura_id
    ]);

    echo "<div class='mensaje_exito'>
        <p class='mensaje_exito__p'>El Registro se ha modificado correctamente.</p>
    </div>";
    $pdo = null;

?>