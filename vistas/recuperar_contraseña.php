<?php

require_once "../php/main.php";

$pdo = conexion();



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
            <h1>Recuperar Contraseña</h1>
        </div>
            <div class="form-rest"></div>
            <form class="registro Confirmacion" method="POST" action="../php/recuperar_contraseña.php" autocomplete="off">
                <label class="" for="user">Usuario</label>
                <input class="" type="text" name="user" maxlength="20" required>
                
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