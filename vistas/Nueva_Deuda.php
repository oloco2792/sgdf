    <h1>Registrar Deuda</h1>
    <div class="form-rest"></div>
    <form class="registro FormularioAjax" method="POST" action="./php/registrar_deuda.php" autocomplete="off">
        <div class="registro__nuevo">
            
            <label class="datosNombres" for="nombre">Nombre</label>
            <input class="activarInput" type="text" name="nombre" pattern="[a-zA-Z]{4, 20}" maxlength="20" required>
        
            <label class="datosNombres" for="apellido">Apellido</label>
            <input class="activarInput" type="text" name="apellido" pattern="[a-zA-Z]{4, 20}" maxlength="20" required>

            <label class="" for="cedula">Cedula (V-)</label>
            <input class="" type="number" name="cedula" pattern="[0-9]{1, 20}" maxlength="20" required>
        </div>

        <label class="" for="monto">Monto</label>
        <input class="" type="number" name="monto" pattern="[0-9]{1, 20}" maxlength="20" required>

        <label class="" for="fecha">Fecha</label>
        <input class="" type="date" name="fecha" pattern="[0-9]{1, 20}" maxlength="20" required>

        <label for="estado">Estado</label>
        <select class="registros__select" name="estado" required>
            <option class="" value="No Pagada"selected>No Pagada</option>
            <option class="" value="Pagada">Pagada</option>    
        </select>

        <label class="" for="descripcion">Descripcion</label>
        <textarea class="" name="descripcion" pattern="{2, 200}" maxlength="200"></textarea>
        
        <?php include_once "./include/botones_form.php" ?>
    </form>

</main>
</div>