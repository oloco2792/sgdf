<?php
require_once "./php/main.php";

$pdo = conexion();

$persona_id = $_POST['persona_id'];
$deuda = $_POST['deuda_id'];

$sql = "SELECT monto_actual FROM deudas WHERE id = :deuda_id AND persona_id = :persona_id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
':deuda_id' => $deuda,
':persona_id' => $persona_id
]);

$monto = $stmt->fetch(PDO::FETCH_ASSOC);

$stmtNombre = $pdo->prepare("SELECT nombre, apellido, cedula FROM personas WHERE id = :persona_id");
$stmtNombre->execute([':persona_id' => $persona_id]);
$persona = $stmtNombre->fetch(PDO::FETCH_ASSOC);
$nombre_completo = $persona ? $persona['nombre'] .' '. $persona['apellido'].' (V-'. $persona['cedula'].') de '. $monto['monto_actual'] .'Bs. (ID: '.$deuda.')': 'Desconocido';

?>

<h1>Pagar deuda de <?=$nombre_completo?></h1>
<div class="form-rest"></div>
<form class="registro FormularioAjax" method="POST" action="./php/pagar_deuda.php" autocomplete="off">

    <?php echo "<input type='hidden' name='deuda_id' value='".$deuda. "'>";?>

    <label class="" for="monto">Monto a Pagar</label>
    <input class="" type="number" name="monto" pattern="[0-9]{1, 20}" maxlength="20" required>

    <label class="" for="fecha_actualizacion">Fecha de Actualizacion</label>
    <input class="" type="date" name="fecha_actualizacion" pattern="[0-9]{1, 20}" maxlength="20" required>

    <label class="" for="descripcion_pago">Descripcion</label>
    <textarea class="" name="descripcion_pago" maxlength="200"></textarea>
    
    <?php include_once "./include/botones_form.php" ?>
</div>
