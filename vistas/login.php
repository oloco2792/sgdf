<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/head.php';?>
    <title>Inicio de Sesion</title>
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
                <form class="login__form__campos" method="POST" action="">
                    <label class="login__form__label" for="name">Usuario</label>
                    <input class="login__form__input"type="text" name="user" pattern="[a-zA-Z0-9]{4, 20}" maxlength="20" required>
                    
                    <label class="login__form__label" for="pass">Contraseña</label>
                    <input class="login__form__input" type="password" name="pass" pattern="[a-zA-Z0-9]{4, 20}" maxlength="20" required>  
                </div>
                <div class="boton-derecha">
                    <input class="login__form__boton"type="submit" value="Ingresar">
                </div>
                </form>
            </div>
            <div class="login__footer">
                <h4>Olvidó la contraseña? <a href=#>Haga Clic Aqui</a></h4>
            </div>
        </main>
    </div>
</body>
</html>