<?php
require_once "main.php";

if($_SESSION['nivel']!==1){
    header("Location: ../index.php?vistas=Inicio");
    exit;
}

$user = limpiar_cadena($_POST['id']);
$pass = limpiar_cadena($_POST['pass']);
$pass_confirm = limpiar_cadena($_POST['pass_confirm']);
$pregunta_1 = limpiar_cadena($_POST['pregunta_1']);
$respuesta_1 = limpiar_cadena($_POST['respuesta_1']);
$pregunta_2 = limpiar_cadena($_POST['pregunta_2']);
$respuesta_2 = limpiar_cadena($_POST['respuesta_2']);

if ($user == "" || $respuesta_1 == "" || $respuesta_2 == "") {
echo "<div class='mensaje_error'>
<p class='mensaje_error__p'>Uno de los campos obligatorios no ha sido llenado.</p>
</div>";
    exit();
}

if (verificar_datos("[a-zA-Z0-9 ]{3,40}", $pass)) {
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>La Contraseña no coincide con el formato solicitado.</p>
    </div>";
    exit();
}
if (verificar_datos("[a-zA-Z0-9]{3,20}", $pass_confirm)) {
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>La pass_confirm no coincide con el formato solicitado.</p>
    </div>";
    exit();
}
if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ]{1,40}", $respuesta_1)) {
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>La Pregunta N°1 no coincide con el formato solicitado.</p>
    </div>";
    exit();
}
if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ]{1,40}", $respuesta_2)) {
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>La Pregunta N°2 no coincide con el formato solicitado.</p>
    </div>";
    exit();
}
if ($pass !== $pass_confirm || $pass_confirm !== $pass) {
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>Las Contraseñas no son iguales.</p>
    </div>";
    exit();
}
if ($pregunta_1 == $pregunta_2 || $pregunta_2 == $pregunta_1) {
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>Las preguntas no pueden ser iguales.</p>
    </div>";
    exit();
}

$pdo = conexion();

$pass_hash = password_hash($pass, PASSWORD_DEFAULT);

$stmt_user = $pdo->prepare("
    UPDATE usuarios SET 
        pass = :pass,
        preguntas1_id = :pregunta_1,
        respuesta_1 = :respuesta_1,
        preguntas2_id = :pregunta_2,
        respuesta_2 = :respuesta_2
    WHERE id = :user
");
$stmt_user->execute([
    ":user" => $user,
    ":pass" => $pass_hash,
    ":pregunta_1" => $pregunta_1,
    ":respuesta_1" => $respuesta_1,
    ":pregunta_2" => $pregunta_2,
    ":respuesta_2" => $respuesta_2
]);
echo
    "<div class='mensaje_exito'>
        <p class='mensaje_exito__p'>Los datos se han modificado correctamente.</p>
    </div>";

$pdo = null;
?>