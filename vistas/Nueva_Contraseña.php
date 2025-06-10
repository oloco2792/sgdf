<?php

require_once "../php/main.php";

$pdo = conexion();

$error = "";

if(isset($_GET['error'])){
$error = $_GET['error'];
}

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
            <h1>Cambiar Contraseña</h1>
        </div>
            <div class="form-rest">
                <?php
                if(isset($_GET['error'])){
                    if($_GET['error']=="pass_incorrectas"){
                        echo "<div class='mensaje_error'>
                        <p class='mensaje_error__p'>Las Contraseñas no son iguales.</p>
                        </div>";
                    }else if($_GET['error']=="pass_cofirm"){
                        echo "<div class='mensaje_error'>
                        <p class='mensaje_error__p'>La confirmacion de contraseña no coincide con el formato solicitado.</p>
                        </div>";
                    }else if($_GET['error']=="pass"){
                        echo "<div class='mensaje_error'>
                        <p class='mensaje_error__p'>La contraseña no coincide con el formato solicitado.</p>
                        </div>";
                    }
                }
                ?>
            </div>
            <form class="registro confirmacion" method="POST" action="../php/nueva_contraseña.php" autocomplete="off">

                <input class="" type="hidden" name="user" value="<?=$_GET['user']?>" maxlength="20" required>

                <label class="" for="pass">Contraseña</label>
                <input class="" type="password" name="pass" maxlength="20" required>

                <label class="" for="pass_confirm">Confirmar Contraseña</label>
                <input class="" type="password" name="pass_confirm" maxlength="20" required>
                
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