<div class="posicion-relativa centrar-vertical">
<main class="contenedor caja">
    <h1>Registrar Factura</h1>
    <div class="form-rest"></div>
    <form class="registro FormularioAjax" method="POST" action="./php/registrar_factura.php" autocomplete="off">
        <div class="registro__nuevo">
            
            <label class="datosNombres" for="razonSocial">Razon Social</label>
            <input class="activarInput" type="text" name="razonSocial" pattern="[a-zA-Z. ]{4, 20}" maxlength="40" required>
        
            <label class="datosNombres" for="rif">RIF(J-)</label>
            <input class="activarInput" type="text" name="rif" pattern="[0-9]{4, 20}" maxlength="20" required>
        </div>

        <label class="" for="monto">Monto</label>
        <input class="" type="number" name="monto" pattern="[0-9]{1, 20}" maxlength="20" required>

        <label class="" for="fecha">Fecha</label>
        <input class="" type="date" name="fecha" pattern="[0-9]{1, 20}" maxlength="20" required>

        <label for="estado">Estado</label>
        <select name="estado" required>
            <option value="No Pagada"selected>No Pagada</option>
            <option value="Pagada">Pagada</option>    
        </select>

        <label class="" for="descripcion">Descripcion</label>
        <textarea class="" name="descripcion" pattern="{2, 200}" maxlength="200"></textarea>
        
    <div class="boton-derecha">
        <input class="boton" type="submit" value="Ingresar">
    </div>
    </form>

</main>
</div>