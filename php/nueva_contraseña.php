<?php
require_once "main.php";

$user = limpiar_cadena($_POST['user']);
$pass = limpiar_cadena($_POST['pass']);
$pass_confirm = limpiar_cadena($_POST['pass_confirm']);


if ($pass_confirm == "" || $pass == "") {
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>Uno de los campos obligatorios no ha sido llenado.</p>
    </div>";
    exit();
}

if (verificar_datos("[a-zA-Z0-9]{3,40}", $pass)) {
    header("Location: ../vistas/Nueva_Contraseña?user=".$user."&error=pass");
    exit();
}

if (verificar_datos("[a-zA-Z0-9]{3,40}", $pass_confirm)) {
    header("Location: ../vistas/Nueva_Contraseña?user=".$user."&error=pass_confirm");
    exit();
}

if ($pass !== $pass_confirm || $pass_confirm !== $pass) {
    header("Location: ../vistas/Nueva_Contraseña?user=".$user."&error=pass_incorrectas");
    exit();
}

$pdo = conexion();

$pass_hash = password_hash($pass, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("UPDATE usuarios SET pass = :pass WHERE user = :user");
$stmt->execute([
    ":pass" => $pass_hash,
    ":user" => $user
]);

if(headers_sent()){
    echo "<script> window.location.href='index.php?vistas=Login&exito=cambio_pass'; </script>";
}else{
    header("Location: ../index.php?vistas=Login&exito=cambio_pass");
}

$pdo = null;
?>