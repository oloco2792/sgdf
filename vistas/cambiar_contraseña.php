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
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <!--?php include "./include/title.php" ?-->
</head>
<body style="display: flex; flex-direction: column; justify-content: space-between">

<div class="rec_caja">
    <main class="contenedor caja pass_rec">
            <h1>Ingresar Nueva Contraseña</h1>
            <form class="registro FormularioAjax" method="POST" action="../php/cambiar_contraseña.php" autocomplete="off">
                <label class="" for="passNew">Ingrese su Nueva Contraseña</label>
                <input class="" type="password" name="passNew" maxlength="20" required>
                <label class="" for="passNewVerif">Ingrese de nuevo su Nueva Contraseña</label>
                <input class="" type="password" name="passNewVerif" maxlength="20" required>
            <div class="botones">
                <button class="boton" value="Regresar"><a class="text-deco-none" href="../index.php?vistas=login">Regresar</a></button>
                <input class="boton" type="submit" value="Ingresar">
            </div>
            </form>
        </div>
    </main>
</div>

<script src="../js/ajax.js"></script>

</body>
</html>