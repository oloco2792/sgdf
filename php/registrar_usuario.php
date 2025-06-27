<?php
require_once "main.php";

$user = limpiar_cadena($_POST['user']);
$pass = limpiar_cadena($_POST['pass']);
$pass_confirm = limpiar_cadena($_POST['pass_confirm']);
$pregunta_1 = limpiar_cadena($_POST['pregunta_1']);
$respuesta_1 = limpiar_cadena($_POST['respuesta_1']);
$pregunta_2 = limpiar_cadena($_POST['pregunta_2']);
$respuesta_2 = limpiar_cadena($_POST['respuesta_2']);
$nivel = limpiar_cadena($_POST['nivel']);

if ($user == "" || $pass == "" || $respuesta_1 == "" || $respuesta_2 == "") {
echo "<div class='mensaje_error'>
<p class='mensaje_error__p'>Uno de los campos obligatorios no ha sido llenado.</p>
</div>";
    exit();
}

if (verificar_datos("[a-zA-Z0-9 ]{3,40}", $user)) {
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>El Usuario no coincide con el formato solicitado.</p>
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

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE user = :user LIMIT 1");
$stmt->execute([":user" => $user]);
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

if ($resultado) {
    if ($resultado['user'] == $user) {
        echo "<div class='mensaje_error'>
                <p class='mensaje_error__p'>El usuario ya se encuentra registrado.</p>
        </div>";
        exit();
    }
}

$pass_hash = password_hash($pass, PASSWORD_DEFAULT);

$stmt_user = $pdo->prepare("INSERT INTO usuarios (user, pass, preguntas1_id, respuesta_1, preguntas2_id, respuesta_2, nivel) VALUES (:user, :pass, :pregunta_1, :respuesta_1, :pregunta_2, :respuesta_2, :nivel)");
$stmt_user->execute([
    ":user" => $user,
    ":pass" => $pass_hash,
    ":pregunta_1" => $pregunta_1,
    ":respuesta_1" => $respuesta_1,
    ":pregunta_2" => $pregunta_2,
    ":respuesta_2" => $respuesta_2,
    ":nivel" => $nivel
]);

echo "<div class='mensaje_exito'>
        <p class='mensaje_exito__p'>El usuario se ha registrado correctamente.</p>
      </div>";

$pdo = null;
?>