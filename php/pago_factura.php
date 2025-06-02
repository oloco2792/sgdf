<?php
require_once "main.php";

    $pdo = conexion();

    $factura_id = limpiar_cadena($_POST['factura_id']);
    $monto = limpiar_cadena($_POST['monto']);
    $fecha_actualizacion = limpiar_cadena($_POST['fecha_actualizacion']);
    $descripcion_pago = limpiar_cadena($_POST['descripcion_pago']);

    if (verificar_datos("[0-9]{1,40}", $monto)) {
        echo "El Monto no coincide con el formato solicitado";
        exit();
    }

    $fecha_formateada = date('Y-m-d', strtotime($fecha_actualizacion));

    $stmt = $pdo->prepare("UPDATE facturas SET
    monto = GREATEST(0, monto - :monto),
    fecha_actualizacion = :fecha_actualizacion,
    descripcion_pago = :descripcion_pago
    WHERE id = :proveedor_id");
    $stmt->execute([
    ':proveedor_id' => $factura_id,
    ':monto' => $monto,
    ':fecha_actualizacion' => $fecha_formateada,
    ':descripcion_pago' => $descripcion_pago
    ]);
	
	$montoNew = $pdo->prepare("SELECT monto from facturas WHERE id = :factura_id");
	$montoNew->execute([
	":factura_id" => $factura_id
	]);
	
	if($montoNew === 0){
	$stmt = $pdo->prepare("UPDATE facturas SET estado = 'Pagada' WHERE id = :proveedor_id");
	$stmt->execute([
	":factura_id" => $factura_id
	]);
	}

    echo "<div class='mensaje_exito'>
            <p class='mensaje_exito__p'>El pago se ha registrado correctamente.</p>
        </div>";
	
    $pdo = null;

?>