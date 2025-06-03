<div class="posicion-relativa centrar-vertical">
    <main class="contenedor">
	<?php echo "<h1>Bienvenido, ".$_SESSION['user']."!</h1>";?>
	<div class="home">
		<div class="home__deudas caja">
		<h3>Deudas</h3>
			<button class="home__boton"><a class="home__enlace" href="#">Visualizar</a></button>
			<button class="home__boton"><a class="home__enlace" href="#">Registrar</a></button>
		</div>
		<div class="home__facturas caja">
		<h3>Facturas</h3>
			<button class="home__boton"><a class="home__enlace" href="#">Visualizar</a></button>
			<button class="home__boton"><a class="home__enlace" href="#">Registrar</a></button>
		</div>
	</div>
    </main>
</div>

