<div class="form-rest"></div>

<main class="contenedor">

    

    <h1>Registrar Deuda</h1>
    <form class="registro formularioAjax" method="POST" action="./php/registrar_deuda.php" autocomplete="off">
        <!--label>Elija una persona</label>
        <select name="personas">
            <option value="persona">Persona 1</option>
        </select>

        <div>
            <input class="" type="checkbox" name="nuevo">
            <label class="" for="nuevo">Usuario No Registrado</label>
        </div>

        <div class="registro__nuevo">
            <label class="" for="nombre">Nombre</label>
            <input class="" type="text" name="nombre" pattern="[a-zA-Z]{4, 20}" maxlength="20" required>
        
            <label class="" for="apellido">Apellido</label>
            <input class="" type="text" name="apellido" pattern="[a-zA-Z]{4, 20}" maxlength="20" required>

            <label class="" for="apodo">Apodo</label>
            <input class="" type="text" name="apodo" pattern="[a-zA-Z]{4, 20}" maxlength="20" required>
        </div-->

        <label class="" for="monto">Monto</label>
        <input class="" type="number" name="monto" pattern="[0-9]{1, 20}" maxlength="20" >

        <!--label class="" for="fecha">Fecha</label>
        <input class="" type="date" name="fecha" pattern="[0-9]{1, 20}" maxlength="20" required-->
    </div>
    <div class="boton-derecha">
        <input class=""type="submit" value="Ingresar">
    </div>
    </form>

    <script src="./js/ajax.js"></script>

</main>