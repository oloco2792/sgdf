<?php
require_once "main.php";

$razon_social = limpiar_cadena($_POST['razon_social']);
$rif = limpiar_cadena($_POST['rif']);
$monto = limpiar_cadena($_POST['monto']);
$fecha = limpiar_cadena($_POST['fecha']);
$estado = limpiar_cadena($_POST['estado']);
$descripcion = limpiar_cadena($_POST['descripcion']);

if ($razon_social == "" || $rif == "" || $monto == "" || $estado == "") {
echo "<div class='mensaje_error'>
<p class='mensaje_error__p'>Uno de los campos obligatorios no ha sido llenado</p>
</div>";
    exit();
}

if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $razon_social)) {
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>El razon_social no coincide con el formato solicitado</p>
    </div>";
    exit();
}

if (verificar_datos("[0-9]{3,20}", $rif)) {
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>El rif no coincide con el formato solicitado</p>
    </div>";
    exit();
}
if (verificar_datos("[0-9]{1,40}", $monto)) {
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>El Monto no coincide con el formato solicitado</p>
    </div>";
    exit();
}

if ($monto == 0) {
    echo "<div class='mensaje_error'>
        <p class='mensaje_error__p'>El Monto no puede ser igual a 0</p>
    </div>";
    exit();
}

$pdo = conexion();

$stmt = $pdo->prepare("SELECT razon_social FROM proveedores WHERE rif = :rif LIMIT 1");
$stmt->execute([':rif' => $rif]);
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

if ($resultado) {
    if ($resultado['razon_social'] !== $razon_social) {
        echo "<div class='mensaje_error'>
                <p class='mensaje_error__p'>El RIF ya se encuentra registrado.</p>
        </div>";
        exit();
    }
    $id_proveedor = null; 

    $stmt = $pdo->prepare("SELECT id FROM proveedores WHERE rif = :rif");
    $stmt->execute([':rif' => $rif]);
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id_proveedor = $row['id'];
    }
} else {

    $stmt = $pdo->prepare("SELECT id FROM proveedores WHERE razon_social = :razon_social");
    $stmt->execute([':razon_social' => $razon_social]);
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id_proveedor = $row['id'];
    } else {
        $stmt_insert = $pdo->prepare("INSERT INTO proveedores (razon_social, rif) VALUES (:razon_social, :rif)");
        $stmt_insert->execute([':razon_social' => $razon_social,':rif' => $rif]);
        $id_proveedor = $pdo->lastInsertId();
    }
}

$fecha_formateada = date('Y-m-d', strtotime($fecha));

$stmt_factura = $pdo->prepare("INSERT INTO facturas (proveedor_id, monto, fecha, estado, descripcion, fecha_actualizacion, descripcion_pago) VALUES (:proveedor_id, :monto, :fecha, :estado, :descripcion, '', '')");
$stmt_factura->execute([
    ':proveedor_id' => $id_proveedor,
    ':monto' => $monto,
    ':fecha' => $fecha_formateada,
    ':estado' => $estado,
    ':descripcion' => $descripcion
]);

echo "<div class='mensaje_exito'>
        <p class='mensaje_exito__p'>La factura se ha registrado correctamente.</p>
      </div>";

$pdo = null;
?>