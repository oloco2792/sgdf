<?php
require_once "main.php";

/*if($_SESSION['nivel']!==1){
    header("Location: ../index.php?vistas=Inicio");
    exit();
}*/

$pdo = conexion();

$persona_id = limpiar_cadena($_POST['persona_id']);
$nombre = limpiar_cadena($_POST['nombre']);
$apellido = limpiar_cadena($_POST['apellido']);
$cedula = limpiar_cadena($_POST['cedula']);

if (verificar_datos("[0-9]{6,8}", $cedula)) {
    echo "La cedula no coincide con el formato solicitado";
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

$stmt_check_cedula = $pdo->prepare("SELECT COUNT(*) FROM personas WHERE cedula = :cedula AND id <> :persona_id");
$stmt_check_cedula->execute([
    ':cedula' => $cedula,
    ':persona_id' => $persona_id
]);
$cedula_existente = $stmt_check_cedula->fetchColumn();

if ($cedula_existente > 0) {
    echo "<div class='mensaje_error'>
              <p class='mensaje_error__p'>La cédula ingresada ya se encuentra registrada para otra persona.</p>
          </div>";
    exit();
}

$stmt_update = $pdo->prepare("UPDATE personas SET
    nombre = :nombre,
    apellido = :apellido,
    cedula = :cedula
    WHERE id = :id");
$stmt_update->execute([
    ':nombre' => $nombre,
    ':apellido' => $apellido,
    ':cedula' => $cedula,
    ':id' => $persona_id
]);

echo "<div class='mensaje_exito'>
          <p class='mensaje_exito__p'>El Registro se ha modificado correctamente.</p>
      </div>";

?>