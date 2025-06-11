<?php
require_once "main.php";

    $pdo = conexion();

    $deuda_id = limpiar_cadena($_POST['deuda_id']);
    $monto = limpiar_cadena($_POST['monto']);
    $fecha_actualizacion = limpiar_cadena($_POST['fecha_actualizacion']);
    $descripcion_pago = limpiar_cadena($_POST['descripcion_pago']);

    if (verificar_datos("[0-9]{1,40}", $monto)) {
        echo "<div class='mensaje_error'>
            <p class='mensaje_error__p'>El monto no coincide con el formato solicitado.</p>
        </div>";
        exit();
    }

    if ($monto == 0) {
        echo "<div class='mensaje_error'>
            <p class='mensaje_error__p'>El monto no puede ser igual a 0.</p>
        </div>";
        exit();
    }

    $montoMayor = $pdo->prepare("SELECT monto FROM deudas WHERE id = :deuda_id");
    $montoMayor->execute([
        ":deuda_id" => $deuda_id
    ]);

    $verificarMontoMayor = $montoMayor->fetch(PDO::FETCH_ASSOC);

    if($monto > $verificarMontoMayor['monto']){
    echo "<div class='mensaje_error'>
        <p class='mensaje_error__p'>El monto introducido no puede ser mayor al registrado.</p>
    </div>";
    exit();
    }

    $fecha_formateada = date('Y-m-d', strtotime($fecha_actualizacion));

    $stmt = $pdo->prepare("UPDATE deudas SET
    monto = GREATEST(0, monto - :monto),
    fecha_actualizacion = :fecha_actualizacion,
    descripcion_pago = :descripcion_pago
    WHERE id = :deuda_id");
    $stmt->execute([
    ':deuda_id' => $deuda_id,
    ':monto' => $monto,
    ':fecha_actualizacion' => $fecha_formateada,
    ':descripcion_pago' => $descripcion_pago
    ]);

    $montoNew = $pdo->prepare("SELECT monto FROM deudas WHERE id = :deuda_id");
    $montoNew->execute([
        ":deuda_id" => $deuda_id
    ]);

    $resultado = $montoNew->fetch(PDO::FETCH_ASSOC);

    if ($resultado['monto'] == 0) {
    $stmt = $pdo->prepare("UPDATE deudas SET estado = 'Pagada' WHERE id = :deuda_id");
    $stmt->execute([
        ":deuda_id" => $deuda_id
    ]);
    }

    echo "<div class='mensaje_exito'>
        <p class='mensaje_exito__p'>El pago se ha registrado correctamente.</p>
    </div>";
    $pdo = null;

?>