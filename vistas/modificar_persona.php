<?php
require_once "./php/main.php";
$persona_id = $_POST['persona_id'];

    $pdo = conexion();
    $stmtNombre = $pdo->prepare("SELECT nombre, apellido, cedula FROM personas WHERE id = :persona_id");
    $stmtNombre->execute([':persona_id' => $persona_id]);
    $persona = $stmtNombre->fetch(PDO::FETCH_ASSOC);
    $nombre_completo = $persona ? $persona['nombre'] .' '. $persona['apellido'] .' (V-'.$persona['cedula'].')' : 'Desconocido';
?>
<h1>Modificar Registro de <?=$nombre_completo?></h1>
    <div class="form-rest"></div>
    <form class="registro FormularioAjax" method="POST" action="./php/modificar_persona.php" autocomplete="off">
            
        <input class="activarInput" type="hidden" name="persona_id" value="<?=$persona_id?>" required>

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