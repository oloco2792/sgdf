<?php
require_once "main.php";

$nombre = limpiar_cadena($_POST['nombre']);
$apellido = limpiar_cadena($_POST['apellido']);
$cedula = limpiar_cadena($_POST['cedula']);

if ($nombre == "" || $apellido == "" || $cedula == "") {
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

if ($cedula == 0) {
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>La cedula no puede estar vacia.</p>
    </div>";
    exit();
}

$pdo = conexion();

$stmt = $pdo->prepare("SELECT nombre, apellido, cedula FROM personas WHERE cedula = :cedula LIMIT 1");
$stmt->execute([':cedula' => $cedula]);
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

if ($resultado) {
    if ($resultado['nombre'] == $nombre && $resultado['apellido'] == $apellido && $resultado['cedula'] == $cedula
    ) {
        echo "<div class='mensaje_error'>
                <p class='mensaje_error__p'>La persona ya esta registrada.</p>
        </div>";
        exit();
    }
    if ($resultado['nombre'] !== $nombre || $resultado['apellido'] !== $apellido) {
        echo "<div class='mensaje_error'>
                <p class='mensaje_error__p'>La cedula ya se encuentra registrada.</p>
        </div>";
        exit();
    }
} else {
        $stmt_insert = $pdo->prepare("INSERT INTO personas (nombre, apellido, cedula) VALUES (:nombre, :apellido, :cedula)");
        $stmt_insert->execute([':nombre' => $nombre, ':apellido' => $apellido, ':cedula' => $cedula]);
        $id_deudor = $pdo->lastInsertId();

        echo "<div class='mensaje_exito'>
                <p class='mensaje_exito__p'>Registro de Persona Exitoso.</p>
        </div>";
    }