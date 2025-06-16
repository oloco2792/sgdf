<?php
require_once "main.php";
    $pdo = conexion();

    $deuda_id = limpiar_cadena($_POST['deuda_id']);
    $monto_actual = limpiar_cadena($_POST['monto_actual']);
    $monto_inicial = limpiar_cadena($_POST['monto_inicial']);
    $fecha = limpiar_cadena($_POST['fecha']);
    $fecha_actualizacion = limpiar_cadena($_POST['fecha_actualizacion']);
    $estado = limpiar_cadena($_POST['estado']);
    $descripcion = limpiar_cadena($_POST['descripcion']);

    if (verificar_datos("[0-9]{1,40}", $monto_actual)) {
        echo "El Monto no coincide con el formato solicitado";
        exit();
    }

    if (verificar_datos("[0-9]{1,40}", $monto_inicial)) {
        echo "El Monto no coincide con el formato solicitado";
        exit();
    }

    $fecha_formateada = date('Y-m-d', strtotime($fecha));
    $fecha_act_formateada = date('Y-m-d', strtotime($fecha_actualizacion));

    $stmt = $pdo->prepare("UPDATE deudas SET
    monto_inicial = :monto_inicial,
    monto_actual = :monto_actual,
    fecha = :fecha,
    fecha_actualizacion = :fecha_actualizacion,
    estado = :estado,
    descripcion = :descripcion
    WHERE id = :id");
    $stmt->execute([
    ':monto_inicial' => $monto_inicial,
    ':monto_actual' => $monto_actual,
    ':fecha' => $fecha_formateada,
    ':fecha_actualizacion' => $fecha_act_formateada,
    ':estado' => $estado,
    ':descripcion' => $descripcion,
    ':id' => $deuda_id
    ]);

    $montoNew = $pdo->prepare("SELECT monto_actual FROM deudas WHERE id = :deuda_id");
    $montoNew->execute([
        ":deuda_id" => $deuda_id
    ]);

    $resultado = $montoNew->fetch(PDO::FETCH_ASSOC);

    if ($resultado['monto_actual'] == 0) {
    $stmt = $pdo->prepare("UPDATE deudas SET estado = 'Pagada' WHERE id = :deuda_id");
    $stmt->execute([
        ":deuda_id" => $deuda_id
    ]);
    }

    echo "<div class='mensaje_exito'>
        <p class='mensaje_exito__p'>El Registro se ha modificado correctamente.</p>
    </div>";
    $pdo = null;

?>