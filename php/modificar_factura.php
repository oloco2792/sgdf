<?php
require_once "main.php";

/*if($_SESSION['nivel']!==1){
    header("Location: ../index.php?vistas=Inicio");
    exit;
}*/

$pdo = conexion();

$deuda_id = limpiar_cadena($_POST['factura_id']);
$monto_actual = limpiar_cadena($_POST['monto_actual']);
$monto_inicial = limpiar_cadena($_POST['monto_inicial']);
$fecha = limpiar_cadena($_POST['fecha']);
$fecha_actualizacion = limpiar_cadena($_POST['fecha_actualizacion']);
$estado = limpiar_cadena($_POST['estado']);
$descripcion = limpiar_cadena($_POST['descripcion']);

if (verificar_datos("[0-9]{1,40}", $monto_actual)) {
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>El Monto Actual no coincide con el formato solicitado</p>
    </div>";
    exit();
}

if (verificar_datos("[0-9]{1,40}", $monto_inicial)) {
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>El Monto Inicial no coincide con el formato solicitado</p>
    </div>";
    exit();
}

if ($monto_inicial == 0) {
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>El Monto Inicial no coincide con el formato solicitado</p>
    </div>";
    exit();
}

if ($monto_actual == 0) {
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>El Monto Actual no coincide con el formato solicitado</p>
    </div>";
    exit();
}

if ($monto_actual > $monto_inicial) {
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>El Monto Actual no puede ser mayor al Monto Inicial</p>
    </div>";
    exit();
}

$fecha_formateada = date('Y-m-d', strtotime($fecha));
$fecha_act_formateada = date('Y-m-d', strtotime($fecha_actualizacion));

$stmt = $pdo->prepare("UPDATE facturas SET
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

$montoNew = $pdo->prepare("SELECT * FROM facturas WHERE id = :deuda_id");
$montoNew->execute([
    ":deuda_id" => $deuda_id,
]);

$resultado = $montoNew->fetch(PDO::FETCH_ASSOC);

if ($resultado['monto_actual'] == 0 && $resultado['estado'] == "No Pagada") {
$stmt = $pdo->prepare("UPDATE facturas SET estado = 'Pagada' WHERE id = :deuda_id");
$stmt->execute([
    ":deuda_id" => $deuda_id
]);
}else if($resultado['monto_actual'] > 0 && $resultado['estado'] == "Pagada"){
    $stmt = $pdo->prepare("UPDATE facturas SET estado = 'No Pagada' WHERE id = :deuda_id");
    $stmt->execute([
    ":deuda_id" => $deuda_id
    ]);
}

echo "<div class='mensaje_exito'>
    <p class='mensaje_exito__p'>El Registro se ha modificado correctamente.</p>
</div>";
$pdo = null;

?>