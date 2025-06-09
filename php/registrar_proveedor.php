<?php
require_once "main.php";

$razon_social = limpiar_cadena($_POST['razon_social']);
$rif = limpiar_cadena($_POST['rif']);

if ($razon_social == "" || $rif == "") {
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

$pdo = conexion();

$stmt_rsocial = $pdo->prepare("SELECT razon_social FROM proveedores WHERE razon_social = :razon_social LIMIT 1");
$stmt_rsocial->execute([':razon_social' => $razon_social]);
$existe_rsocial = $stmt_rsocial->fetch(PDO::FETCH_ASSOC);

if ($existe_rsocial) {
    echo "<div class='mensaje_error'>
            <p class='mensaje_error__p'>El nombre/razon social ya esta registrado.</p>
          </div>";
    exit();
}

$stmt = $pdo->prepare("SELECT razon_social, rif FROM proveedores WHERE rif = :rif LIMIT 1");
$stmt->execute([':rif' => $rif]);
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

if ($resultado) {
    if ($resultado['razon_social'] == $razon_social && $resultado['rif'] == $rif) {
        echo "<div class='mensaje_error'>
                <p class='mensaje_error__p'>El proveedor ya está registrado.</p>
        </div>";
        exit();
    }
    if ($resultado['razon_social'] !== $razon_social) {
        echo "<div class='mensaje_error'>
                <p class='mensaje_error__p'>El RIF ya se encuentra registrado.</p>
        </div>";
        exit();
    }
} else {
    $stmt_insert = $pdo->prepare("INSERT INTO proveedores (razon_social, rif) VALUES (:razon_social, :rif)");
    $stmt_insert->execute([':razon_social' => $razon_social, ':rif' => $rif]);
    $id_deudor = $pdo->lastInsertId();

    echo "<div class='mensaje_exito'>
            <p class='mensaje_exito__p'>Registro de Proveedor Exitoso.</p>
    </div>";
}
?>