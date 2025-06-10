<?php

require_once "../php/main.php";

$pdo = conexion();

$user = limpiar_cadena($_GET['user']);

if ($user == "") {
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>Uno de los campos obligatorios no ha sido llenado</p>
    </div>";
    exit();
}

$stmt = $pdo->prepare("SELECT preguntas1_id, preguntas2_id FROM usuarios WHERE user = :user");
$stmt->execute([':user' => $user]);
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT pregunta FROM preguntas1 WHERE id = :id");
$stmt->execute([':id' => $resultado['preguntas1_id']]);
$pregunta1 = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT pregunta FROM preguntas2 WHERE id = :id");
$stmt->execute([':id' => $resultado['preguntas2_id']]);
$pregunta2 = $stmt->fetch(PDO::FETCH_ASSOC);

$pdo = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Roboto-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!--Lato-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <!--CSS-->
    <link rel="preconnect" href="../css/normalize.css" as="style">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="preconnect" href="../css/styles.css" as="style">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    <title>Recuperar Contraseña</title>
</head>
<body style="display: flex; flex-direction: column; justify-content: space-between">

<div class="rec_caja">
    <main class="contenedor caja pass_rec">
        <div class="recuperar_contraseña">
            <img class="recuperar_contraseña_img" src="../img/favicon.ico">
            <h1>Verificar Preguntas de Seguridad de <?=$_GET['user']?></h1>
        </div>
            <div class="form-rest"></div>
            <form class="registro confirmacion" method="POST" action="../php/verificar_preguntas.php" autocomplete="off">
                <input class="" type="hidden" name="user" value="<?=$user?>" maxlength="20" required>

                <label class="" for="user">Pregunta N°1: <?=$pregunta1['pregunta']?></label>
                <input class="" type="text" name="pregunta1" maxlength="20" required>

                <label class="" for="user">Pregunta N°2: <?=$pregunta2['pregunta']?></label>
                <input class="" type="text" name="pregunta2" maxlength="20" required>
                
            <div class="botones">
                <button class="boton" value="Regresar"><a class="text-deco-none" href="../index.php?vistas=login">Regresar</a></button>
                <input class="boton" type="submit" value="Ingresar">
            </div>
            </form>
        </div>
    </main>
</div>
<script src="../js/ajax.js"></script>
<script src="../js/boton.js"></script>
<script src="../js/confirmacion.js"></script>
</body>
</html>