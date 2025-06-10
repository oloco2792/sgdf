<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/head.php';?>
</head>
<body>
    <div class="caja_flex">
        <section class="izquierda">
        </section>
        <main class="derecha login">
            <div class="login__header">
                <h1>Sistema de Gestion de Deudas y Facturas</h1>
            </div>
            <div class="caja width90 fondo-blanco">
                <div class="login__form">
                <div>
                <?php
                if(isset($_GET['exito'])){
                    if($_GET['exito']=="cambio_pass"){
                        echo "<div class='mensaje_exito'>
                        <p class='mensaje_exito__p'>La contraseña se ha cambiado con exito.</p>
                        </div>";
                    }
                }
                ?>
                </div>
                <form class="login__form__campos" method="POST" action="" autocomplete="off">
                    <label class="login__form__label" for="user">Usuario</label>
                    <input class="login__form__input"type="text" name="user" pattern="[a-zA-Z0-9]{4, 20}" maxlength="20" required>
                    
                    <label class="login__form__label" for="pass">Contraseña</label>
                    <input class="login__form__input" type="password" name="pass" pattern="[a-zA-Z0-9]{4, 20}" maxlength="20" required>  
                </div>
                <div class="boton-derecha">
                    <input class="boton" type="submit" value="Ingresar">
                </div>
                <?php
                    if(isset($_POST['user']) && isset($_POST['pass'])){
                        require_once './php/main.php';

                        require_once './php/iniciar_sesion.php';

                    }

                    include "./include/login_footer.php";
                ?>
