<div class="contenedor--bg">
    <nav class="contenedor navegacion">
        <a class="navegacion__opcion" href="index.php?vistas=Inicio">Inicio</a>
        <div class="dropdown">
            <button class="dropbtn navegacion__opcion">Deudas</button>
            <div class="dropdown-content">
                <a href="index.php?vistas=Nueva_Deuda">Registrar</a>
                <a href="index.php?vistas=Ver_Deudas">Ver</a>
                <?php
                if($_SESSION['user']=="admin"){
                echo'
                <a href="index.php?vistas=Modificar_Deudas_Registros">Modificar</a>
                <a href="index.php?vistas=Eliminar_Deudas_Registros">Eliminar</a>
                ';
                }
                ?>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn navegacion__opcion">Facturas</button>
            <div class="dropdown-content">
                <a href="index.php?vistas=factura_new">Registrar</a>
                <a href="index.php?vistas=ver_facturas">Ver</a>
                <?php
                if($_SESSION['user']=="admin"){
                echo'
                <a href="index.php?vistas=modificar_facturas">Modificar</a>
                <a href="index.php?vistas=eliminar_facturas">Eliminar</a>
                ';
                }
                ?>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn navegacion__opcion">Personas</button>
            <div class="dropdown-content">
                <a href="index.php?vistas=registrar_personas">Registrar</a>
                <a href="index.php?vistas=ver_personas">Ver</a>
                <?php
                if($_SESSION['user']=="admin"){
                echo'
                <a href="index.php?vistas=modificar_personas">Modificar</a>
                <a href="index.php?vistas=eliminar_personas">Eliminar</a>
                ';
                }
                ?>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn navegacion__opcion">Proveedores</button>
            <div class="dropdown-content">
                <a href="index.php?vistas=registrar_proveedor">Registrar</a>
                <a href="index.php?vistas=ver_personas">Ver</a>
                <?php
                if($_SESSION['user']=="admin"){
                echo'
                <a href="index.php?vistas=modificar_proveedores">Modificar</a>
                <a href="index.php?vistas=eliminar_proveedores">Eliminar</a>
                ';
                }
                ?>

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
            echo '<a class="navegacion__opcion" href="index.php?vistas=respaldar_db">Respaldo</a>';
        }
        ?>

        <a class="navegacion__opcion" href="index.php?vistas=logout">Salir</a>
    </nav>
</div>