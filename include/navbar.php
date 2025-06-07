<div class="contenedor--bg">
    <nav class="contenedor navegacion">

        <a class="navegacion__opcion" href="index.php?vistas=home">Inicio</a>
        <div class="dropdown">
            <button class="dropbtn navegacion__opcion">Registrar</button>
            <div class="dropdown-content">
                <a href="index.php?vistas=deuda_new">Registrar Deuda</a>
                <a href="index.php?vistas=factura_new">Registrar Factura</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn navegacion__opcion">Ver Registros</button>
            <div class="dropdown-content">
                <a href="index.php?vistas=ver_deudas">Ver Deudas</a>
                <a href="index.php?vistas=ver_facturas">Ver Facturas</a>
            </div>
        </div>

        <!--div class="dropdown">
            <button class="dropbtn navegacion__opcion">Usuarios</button>
            <div class="dropdown-content">
                <a href="index.php?vistas=ver_usuarios">Ver</a>
                <a href="index.php?vistas=añadir_usuarios">Añadir</a>
                <a href="index.php?vistas=modificar_usuarios">Modificar</a>
                <a href="index.php?vistas=eliminar_usuarios">Eliminar</a>
            </div>
        </div-->
        <?php
        if($_SESSION['user']=="admin"){
            echo'<div class="dropdown">
            <button class="dropbtn navegacion__opcion">Modificar Registros</button>
            <div class="dropdown-content">
                <a href="index.php?vistas=modificar_personas">Modificar Personas</a>
                <a href="index.php?vistas=modificar_proveedores">Modificar Proveedores</a>
                <a href="index.php?vistas=modificar_deudas">Modificar Deudas</a>
                <a href="index.php?vistas=modificar_facturas">Modificar Facturas</a>
            </div>
        </div>';
        echo'<div class="dropdown">
            <button class="dropbtn navegacion__opcion">Eliminar Registros</button>
            <div class="dropdown-content">
                <a href="index.php?vistas=eliminar_personas">Eliminar Personas</a>
                <a href="index.php?vistas=eliminar_proveedores">Eliminar Proveedores</a>
                <a href="index.php?vistas=eliminar_deudas">Eliminar Deudas</a>
                <a href="index.php?vistas=eliminar_facturas">Eliminar Facturas</a>
            </div>
        </div>';
            echo '<a class="navegacion__opcion" href="index.php?vistas=respaldar_db">Respaldo</a>';
        }

        ?>
        <a class="navegacion__opcion" href="index.php?vistas=logout">Salir</a>
    </nav>
</div>