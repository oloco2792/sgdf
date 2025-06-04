<div class="posicion-relativa centrar-vertical">
    <main class="contenedor">
	<?php echo "<h1>Bienvenido, ".$_SESSION['user']."!</h1>";?>
	<div class="home">
		<button class="home__boton"><a class="home__enlace" href="index.php?vistas=ver_facturas">Visualizar Facturas</a></button>
		<button class="home__boton"><a class="home__enlace" href="index.php?vistas=ver_deudas">Visualizar Deudas</a></button>
		<button class="home__boton"><a class="home__enlace" href="index.php?vistas=factura_new">Registrar Facturas</a></button>
		<button class="home__boton"><a class="home__enlace" href="index.php?vistas=deuda_new">Registrar Deudas</a></button>

		<!--div class="home__deudas caja">
		<h3>Deudas</h3>

		</div>
		<div class="home__facturas caja">
		<h3>Facturas</h3>

		</div-->

		
	</div>
    </main>
</div>

