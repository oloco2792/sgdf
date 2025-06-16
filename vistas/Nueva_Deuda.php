<?php require_once './php/main.php';?>

<h1>Registrar Deuda</h1>
<div class="form-rest"></div>
<form class="registro FormularioAjax" method="POST" action="./php/registrar_deuda.php" autocomplete="off">
    <div class="registro__nuevo">
        
    <?php 
    
    if(isset($_POST['persona_id'])){
        $persona_id = limpiar_cadena($_POST['persona_id']);

        $pdo = conexion();

            $stmt = $pdo->prepare("SELECT nombre, apellido, cedula FROM personas WHERE id = :id");
            $stmt->execute([':id' => $persona_id]);
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
        echo '<label class="datosNombres input_disabled" for="nombre">Nombre</label>
        <input class="activarInput input_disabled" type="text" name="nombre" pattern="[a-zA-Z]{3, 40}" maxlength="20" value="'.$resultado['nombre'].'" required>
    
        <label class="datosNombres input_disabled" for="apellido">Apellido</label>
        <input class="activarInput input_disabled" type="text" name="apellido" pattern="[a-zA-Z]{3, 40}" maxlength="20" value="'.$resultado['apellido'].'" required>

        <label class="input_disabled" for="cedula">Cedula (V-)</label>
        <input class="input_disabled" type="number" name="cedula" pattern="[0-9]{6, 8}" maxlength="20" value="'.$resultado['cedula'].'" required>';
            }
    }else{
    echo '<label class="datosNombres" for="nombre">Nombre</label>
        <input class="activarInput" type="text" name="nombre" pattern="[a-zA-Z]{3, 40}" maxlength="20" required>
    
        <label class="datosNombres" for="apellido">Apellido</label>
        <input class="activarInput" type="text" name="apellido" pattern="[a-zA-Z]{4, 40}" maxlength="20" required>

        <label class="" for="cedula">Cedula (V-)</label>
        <input class="" type="number" name="cedula" pattern="[0-9]{6, 8}" maxlength="20" required>';
    }

    ?>
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