<div class="posicion-relativa centrar-vertical">
<main class="contenedor caja">
    <h1>Registrar Deuda</h1>
    <div class="form-rest"></div>
    <form class="registro FormularioAjax" method="POST" action="./php/registrar_deuda.php" autocomplete="off">
        <label>Elija una persona</label>
        <select onchange="disableCampos(this)" name="personas" class="datos">
            <option value="persona">Persona 1</option>
        </select>

        <div>
            <input class="" onchange="enableCampos(this)" type="checkbox" name="nuevo">
            <label class="" for="nuevo">Usuario No Registrado</label>
        </div>

        <div class="registro__nuevo">
            <label class="datosNombres label--off" for="nombre">Nombre</label>
            <input class="activarInput" type="text" name="nombre" pattern="[a-zA-Z]{4, 20}" maxlength="20" required disabled>
        
            <label class="datosNombres label--off" for="apellido">Apellido</label>
            <input class="activarInput" type="text" name="apellido" pattern="[a-zA-Z]{4, 20}" maxlength="20" required disabled>

            <label class="datosNombres label--off" for="apodo">Apodo</label>
            <input class="activarInput" type="text" name="apodo" pattern="[a-zA-Z]{4, 20}" maxlength="20" disabled>
        </div>

        <label class="" for="monto">Monto</label>
        <input class="" type="number" name="monto" pattern="[0-9]{1, 20}" maxlength="20" required>

        <label class="" for="fecha">Fecha</label>
        <input class="" type="date" name="fecha" pattern="[0-9]{1, 20}" maxlength="20" required>
        
    <div class="boton-derecha">
        <input class="" type="submit" value="Ingresar">
    </div>
    </form>

</main>
</div>