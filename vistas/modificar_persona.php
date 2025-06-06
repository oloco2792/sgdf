<?php
require_once "./php/main.php";
$persona_id = $_POST['persona_id'];

    $pdo = conexion();
    $stmtNombre = $pdo->prepare("SELECT nombre, apellido, cedula FROM personas WHERE id = :persona_id");
    $stmtNombre->execute([':persona_id' => $persona_id]);
    $persona = $stmtNombre->fetch(PDO::FETCH_ASSOC);
    $nombre_completo = $persona ? $persona['nombre'] .' '. $persona['apellido'] .' (V-'.$persona['cedula'].')' : 'Desconocido';
?>
<div class="posicion-relativa centrar-vertical">
    <main class="contenedor caja">
    <h1>Modificar datos de <?php echo $nombre_completo ?></h1>
    <div class="form-rest"></div>
    <form class="registro FormularioAjax" method="POST" action="./php/modificar_persona.php" autocomplete="off">

        <?php echo "<input class='' type='hidden' name='persona_id' value='".$persona_id."'>"?>

        <label class="" for="nombre">Nombre</label>
        <input class="" type="text" name="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1, 20}" maxlength="20" required>

        <label class="" for="apellido">Apellido</label>
        <input class="" type="text" name="apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1, 20}" maxlength="20" required>

        <label class="" for="cedula">Cedula</label>
        <input class="" type="number" name="cedula" pattern="[0-9]{1, 20}" maxlength="20" required>
        
    <div class="boton-derecha">
        <input class="boton" type="submit" value="Ingresar">
    </div>
    </form>
    </main>
</div>