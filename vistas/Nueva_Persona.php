    <h1>Registrar Cliente</h1>
    <div class="form-rest"></div>
    <form class="registro FormularioAjax" method="POST" action="./php/registrar_persona.php" autocomplete="off">
            
            <label class="datosNombres" for="nombre">Nombre</label>
            <input class="activarInput" type="text" name="nombre" pattern="[a-zA-Z]{4, 20}" maxlength="20" required>
        
            <label class="datosNombres" for="apellido">Apellido</label>
            <input class="activarInput" type="text" name="apellido" pattern="[a-zA-Z]{4, 20}" maxlength="20" required>

            <label class="" for="cedula">Cedula (V-)</label>
            <input class="" type="number" name="cedula" pattern="[0-9]{1, 20}" maxlength="20" required>
        
        <?php include_once "./include/botones_form.php" ?>
    </form>

</main>
</div>