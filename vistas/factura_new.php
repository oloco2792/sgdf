<main class="contenedor">
    <div class="form-rest"></div>
    <h1>Registrar Factura</h1>
    <form class="registro form-rest" method="POST" action="">
        <label>Elija una nombre</label>
        <select name="personas">
            <option value="persona">Persona 1</option>
        </select>

        <div>
            <input class="" type="checkbox" name="nuevo">
            <label class="" for="nuevo">Usuario No Registrado</label>
        </div>

        <div class="registro__nuevo">
            <label class="" for="razonSocial">Razon Social</label>
            <input class="" type="text" name="razonSocial" pattern="[a-zA-Z]{4, 20}" maxlength="20" required>

            <label class="" for="rif">Numero de RIF</label>
            <input class="" type="number" name="rif" pattern="[0-9]{9, 9}" maxlength="20" required>
        </div>

        <label class="" for="monto">Monto</label>
        <input class="" type="number" name="monto" pattern="[0-9]{1, 20}" maxlength="20" required>

        <label class="" for="fecha">Fecha</label>
        <input class="" type="date" name="fecha" pattern="[0-9]{1, 20}" maxlength="20" required>
    </div>
    <div class="boton-derecha">
        <input class=""type="submit" value="Ingresar">
    </div>
    </form>
</main>