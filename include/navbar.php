<div class="contenedor--bg">
<nav class="contenedor navegacion">
    <a class="navegacion__opcion" href="index.php?vistas=Inicio">Inicio</a>
    <a class="navegacion__opcion" href="index.php?vistas=Ver_Deudas">Deudas</a>
    <a class="navegacion__opcion" href="index.php?vistas=Ver_Facturas">Facturas</a>
    <a class="navegacion__opcion" href="index.php?vistas=Ver_Personas">Clientes</a>
    <a class="navegacion__opcion" href="index.php?vistas=Ver_Proveedores">Proveedores</a>
    <!--div class="dropdown">
        <button class="dropbtn navegacion__opcion">Deudas</button>
        <div class="dropdown-content">
            <a href="index.php?vistas=Nueva_Deuda">Registrar</a>
            <a href="index.php?vistas=Ver_Deudas">Ver</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn navegacion__opcion">Facturas</button>
        <div class="dropdown-content">
            <a href="index.php?vistas=Nueva_Factura">Registrar</a>
            <a href="index.php?vistas=Ver_Facturas">Ver</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn navegacion__opcion">Clientes</button>
        <div class="dropdown-content">
            <a href="index.php?vistas=Nueva_Persona">Registrar</a>
            <a href="index.php?vistas=Ver_Personas">Ver</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn navegacion__opcion">Proveedores</button>
        <div class="dropdown-content">
            <a href="index.php?vistas=Nuevo_Proveedor">Registrar</a>
            <a href="index.php?vistas=Ver_Proveedores">Ver</a>
        </div>
    </div-->
    <?php
    if($_SESSION['nivel']=="1"){
        echo'
        <div class="dropdown">
        <button class="dropbtn navegacion__opcion">Administrador</button>
        <div class="dropdown-content">
            <a href="index.php?vistas=Registrar_Usuario">Registrar Usuario</a>
            <a href="index.php?vistas=Modificar_Perfil">Modificar Perfil</a>
            <a href="index.php?vistas=Ver_Usuarios">Ver Usuarios</a>
            '.'<a class="navegacion__opcion--puntero">
            <form class="navegacion__opcion--puntero confirmacion redireccion" method="POST" action="./php/respaldar_db.php">
            <input class="navegacion__opcion--puntero navegacion__form" type="submit" value="Respaldar DB" value="_blank">
            </form></a>
        </div>
        </div>';
    }else{
        echo'
        <div class="dropdown">
        <button class="dropbtn navegacion__opcion">Usuario</button>
        <div class="dropdown-content">
            <a href="index.php?vistas=Modificar_Perfil">Modificar Perfil</a>
        </div>
        </div>';
    }
    ?>
    <a class="navegacion__opcion" href="index.php?vistas=logout">Salir</a>
</nav>
</div>