<?php echo "<h1>Bienvenido, ".$_SESSION['user']."!</h1>";?>
<div class="home">
	<button class="home__boton"><a class="home__enlace" href="index.php?vistas=ver_facturas">Visualizar Facturas</a></button>
	<button class="home__boton"><a class="home__enlace" href="index.php?vistas=ver_deudas">Visualizar Deudas</a></button>
	<button class="home__boton"><a class="home__enlace" href="index.php?vistas=factura_new">Registrar Facturas</a></button>
	<button class="home__boton"><a class="home__enlace" href="index.php?vistas=Nueva_Deuda">Registrar Deudas</a></button>
</div>