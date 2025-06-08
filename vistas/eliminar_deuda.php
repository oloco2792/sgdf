<?php
require_once "./php/main.php";
$deuda_id = $_POST['deuda_id'];
$persona_id = $_POST['persona_id'];

    $pdo = conexion();
    $stmtNombre = $pdo->prepare("SELECT nombre, apellido, cedula FROM personas WHERE id = :persona_id");
    $stmtNombre->execute([':persona_id' => $persona_id]);
    $persona = $stmtNombre->fetch(PDO::FETCH_ASSOC);
    $nombre_completo = $persona ? $persona['nombre'] .' '. $persona['apellido'] .' (V-'.$persona['cedula'].')' : 'Desconocido';

    $stmtNombre = $pdo->prepare("SELECT monto FROM deudas WHERE id = :deuda_id");
    $stmtNombre->execute([':deuda_id' => $deuda_id]);
    $deudaOld = $stmtNombre->fetch(PDO::FETCH_ASSOC);
    $deudaTitulo = $deudaOld['monto'];
?>
<h1>Modificar deuda de <?php echo $nombre_completo ?> de <?php echo $deudaTitulo?></h1>
<div class="form-rest"></div>
<form class="registro FormularioAjax" method="POST" action="./php/modificar_deuda.php" autocomplete="off">

    <input class="" type="hidden" name="deuda_id" value="<?php echo $deuda_id ?>">    

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
    <textarea class="" name="descripcion" maxlength="200"></textarea>
    
    <?php include "./include/botones_form.php";?>
</div>