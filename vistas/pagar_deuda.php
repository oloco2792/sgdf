<?php
require_once "./php/main.php";
$persona_id = $_POST['persona_id'];
$deuda = $_POST['deuda_id'];

    $sql = "SELECT * FROM deudas WHERE persona_id = :persona_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':persona_id' => $persona_id]);

    $stmtNombre = $pdo->prepare("SELECT nombre, apellido, cedula FROM personas WHERE id = :persona_id");
    $stmtNombre->execute([':persona_id' => $persona_id]);
    $persona = $stmtNombre->fetch(PDO::FETCH_ASSOC);
    $nombre_completo = $persona ? $persona['nombre'] .' '. $persona['apellido'].' (V-'. $persona['cedula'].')': 'Desconocido';
?>

<div class="posicion-relativa centrar-vertical">
    <main class="contenedor caja">
    <h1>Pagar deuda</h1>
    <div class="form-rest"></div>
    <form class="registro FormularioAjax" method="POST" action="./php/pago_deuda.php" autocomplete="off">

        <?php echo "<input type='hidden' name='deuda_id' value='".$deuda. "'>";?>

        <label class="" for="monto">Monto a Pagar</label>
        <input class="" type="number" name="monto" pattern="[0-9]{1, 20}" maxlength="20" required>

        <label class="" for="fecha_actualizacion">Fecha de Actualizacion</label>
        <input class="" type="date" name="fecha_actualizacion" pattern="[0-9]{1, 20}" maxlength="20" required>

        <label class="" for="descripcion_pago">Descripcion</label>
        <textarea class="" name="descripcion_pago" maxlength="200"></textarea>
        
    <div class="boton-derecha">
        <input class="" type="submit" value="Ingresar">
    </div>
    </form>
    </main>
</div>
