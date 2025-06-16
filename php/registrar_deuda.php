<?php
require_once "main.php";

$nombre = limpiar_cadena($_POST['nombre']);
$apellido = limpiar_cadena($_POST['apellido']);
$cedula = limpiar_cadena($_POST['cedula']);
$monto = limpiar_cadena($_POST['monto']);
$fecha = limpiar_cadena($_POST['fecha']);
$estado = limpiar_cadena($_POST['estado']);
$descripcion = limpiar_cadena($_POST['descripcion']);

if ($nombre == "" || $apellido == "" || $monto == "" || $estado == "") {
echo "<div class='mensaje_error'>
<p class='mensaje_error__p'>Uno de los campos obligatorios no ha sido llenado</p>
</div>";
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
if (verificar_datos("[0-9]{3,20}", $cedula)) {
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>La cedula no coincide con el formato solicitado</p>
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

$stmt = $pdo->prepare("SELECT nombre, apellido FROM personas WHERE cedula = :cedula LIMIT 1");
$stmt->execute([':cedula' => $cedula]);
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

if ($resultado) {
    if ($resultado['nombre'] !== $nombre || $resultado['apellido'] !== $apellido) {
        echo "<div class='mensaje_error'>
                <p class='mensaje_error__p'>La cedula ya se encuentra registrada.</p>
        </div>";
        exit();
    }
    $id_deudor = null; 

    $stmt = $pdo->prepare("SELECT id FROM personas WHERE cedula = :cedula");
    $stmt->execute([':cedula' => $cedula]);
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id_deudor = $row['id'];
    }
} else {

    $stmt = $pdo->prepare("SELECT id FROM personas WHERE nombre = :nombre AND apellido = :apellido");
    $stmt->execute([':nombre' => $nombre, ':apellido' => $apellido]);
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id_deudor = $row['id'];
    } else {
        $stmt_insert = $pdo->prepare("INSERT INTO personas (nombre, apellido, cedula) VALUES (:nombre, :apellido, :cedula)");
        $stmt_insert->execute([':nombre' => $nombre, ':apellido' => $apellido, ':cedula' => $cedula]);
        $id_deudor = $pdo->lastInsertId();
    }
}

$fecha_formateada = date('Y-m-d', strtotime($fecha));

$stmt_deuda = $pdo->prepare("INSERT INTO deudas (persona_id, monto, fecha, estado, descripcion, monto_actual, fecha_actualizacion) VALUES (:persona_id, :monto, :fecha, :estado, :descripcion, :monto, :fecha)");
$stmt_deuda->execute([
    ':persona_id' => $id_deudor,
    ':monto' => $monto,
    ':fecha' => $fecha_formateada,
    ':estado' => $estado,
    ':descripcion' => $descripcion
]);

echo "<div class='mensaje_exito'>
        <p class='mensaje_exito__p'>La deuda se ha registrado correctamente.</p>
      </div>";

$pdo = null;
?>