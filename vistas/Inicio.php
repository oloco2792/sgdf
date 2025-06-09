<?php
echo "<h1>Bienvenido, ".$_SESSION['user']."!</h1>";

if (isset($_GET['mensaje'])) {
    switch ($_GET['mensaje']){
		case "eliminar_deuda_exito":
			echo "<div class='eliminar_deuda_exito'>
        		<p class='mensaje_exito__p'>La deuda se ha eliminado correctamente.</p>
    		</div>";
		break;
		case "eliminar_factura_exito":
			echo "<div class='mensaje_exito'>
        		<p class='mensaje_exito__p'>La factura se ha eliminado correctamente.</p>
    		</div>";
		break;
		case "eliminar_persona_exito":
			echo "<div class='mensaje_exito'>
        		<p class='mensaje_exito__p'>La persona registrada se ha eliminado correctamente.</p>
    		</div>";
		break;
		case "eliminar_proveedor_exito":
			echo "<div class='mensaje_exito'>
        		<p class='mensaje_exito__p'>El proveedor registrada se ha eliminado correctamente.</p>
    		</div>";
		break;
		case "respaldar_db_exito":
			echo "<div class='mensaje_exito'>
        		<p class='mensaje_exito__p'>La Base de Datos se ha exportado correctamente.</p>
    		</div>";
		break;
		case "respaldar_db_error":
			echo "<div class='mensaje_error'>
        		<p class='mensaje_error__p'>Error al exportar la Base de Datos</p>
    		</div>";
		break;
		case "eliminar_error":
			echo "<div class='mensaje_error'>
        		<p class='mensaje_error__p'>Algo ha salido mal.</p>
    		</div>";
		break;
	}
}
?>

<div class="home">
	<button class="home__boton"><a class="home__enlace" href="index.php?vistas=Ver_Facturas">Visualizar Facturas</a></button>
	<button class="home__boton"><a class="home__enlace" href="index.php?vistas=Ver_Deudas">Visualizar Deudas</a></button>
	<button class="home__boton"><a class="home__enlace" href="index.php?vistas=Nueva_Factura">Registrar Facturas</a></button>
	<button class="home__boton"><a class="home__enlace" href="index.php?vistas=Nueva_Deuda">Nueva Deudas</a></button>
</div>