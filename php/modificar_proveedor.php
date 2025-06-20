<?php
require_once "main.php";

if($_SESSION['nivel']!==1){
    header("Location: ../index.php?vistas=Inicio");
    exit;
}

$pdo = conexion();

$id = limpiar_cadena($_POST['proveedor_id']);
$nombre = limpiar_cadena($_POST['razon_social']);
$rif = limpiar_cadena($_POST['rif']);

if (verificar_datos("[0-9]{9,10}", $rif)) {
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>El RIF no coincide con el formato solicitado</p>
    </div>";
    exit();
}

    if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $nombre)) {
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>El Nombre/Razon Social no coincide con el formato solicitado</p>
    </div>";
    exit();
}

$stmt_check_cedula = $pdo->prepare("SELECT COUNT(*) FROM proveedores WHERE rif = :rif AND id <> :id");
$stmt_check_cedula->execute([
    ':rif' => $rif,
    ':id' => $id
]);
$cedula_existente = $stmt_check_cedula->fetchColumn();

if ($cedula_existente > 0) {
    echo "<div class='mensaje_error'>
              <p class='mensaje_error__p'>El RIF ingresado ya se encuentra registrado para otra persona.</p>
          </div>";
    exit();
}

$stmt_update = $pdo->prepare("UPDATE proveedores SET
    razon_social = :nombre,
    rif = :cedula
    WHERE id = :id");
$stmt_update->execute([
    ':nombre' => $nombre,
    ':cedula' => $rif,
    ':id' => $id
]);

echo "<div class='mensaje_exito'>
          <p class='mensaje_exito__p'>El Registro se ha modificado correctamente.</p>
      </div>";

?>