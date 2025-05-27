<?php require_once "./php/personas_select.php"?>

<div class="posicion-relativa centrar-vertical">
<main class="contenedor caja">
    <h1>Registrar Deuda</h1>
    <div class="form-rest"></div>
    <form class="registro FormularioAjax" method="POST" action="./php/registrar_deuda.php" autocomplete="off">
        <!--div>
            <input class="" onchange="enableCampos(this)" type="checkbox" name="nuevo">
            <label class="" for="nuevo">Usuario No Registrado</label>
        </div>

        <label for="personas">Elija una persona</label>
            <select name="personas" id="persona" class="datos">
                <option value="">--Seleccione una persona--</option>
                <?php foreach ($personas as $persona): ?>
                    <option value="<?php echo htmlspecialchars($persona['id']); ?>">
                        <?php echo htmlspecialchars($persona['nombre'] . ' ' . $persona['apellido']); ?>
                    </option>
                <?php endforeach; ?>
            </select-->
        <div class="registro__nuevo">
            <label class="datosNombres" for="nombre">Nombre</label>
            <input class="activarInput" type="text" name="nombre" pattern="[a-zA-Z]{4, 20}" maxlength="20" required>
        
            <label class="datosNombres" for="apellido">Apellido</label>
            <input class="activarInput" type="text" name="apellido" pattern="[a-zA-Z]{4, 20}" maxlength="20" required>

            <label class="datosNombres" for="apodo">Apodo</label>
            <input class="activarInput" type="text" name="apodo" pattern="[a-zA-Z]{4, 20}" maxlength="20">
        </div>

        <label class="" for="monto">Monto</label>
        <input class="" type="number" name="monto" pattern="[0-9]{1, 20}" maxlength="20" required>

        <label class="" for="fecha">Fecha</label>
        <input class="" type="date" name="fecha" pattern="[0-9]{1, 20}" maxlength="20" required>

        <label for="estado">Estado</label>
        <select name="estado" required>
            <option value="No Pagada" selected>No Pagada</option>
            <option value="Pagada">Pagada</option>    
        </select>

        <label class="" for="descripcion">Descripcion</label>
        <textarea class="" name="descripcion" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{2, 200}" maxlength="200"></textarea>
        
    <div class="boton-derecha">
        <input class="" type="submit" value="Ingresar">
    </div>
    </form>

</main>
</div>