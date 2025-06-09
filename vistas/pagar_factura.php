<?php
require_once "./php/main.php";

$pdo = conexion();

$factura = $_POST['factura_id'];
$proveedor_id = $_POST['proveedor_id'];

$sql = "SELECT monto FROM facturas WHERE id = :factura_id AND proveedor_id = :proveedor_id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
':factura_id' => $factura,
':proveedor_id' => $proveedor_id
]);

$monto = $stmt->fetch(PDO::FETCH_ASSOC);

$stmtNombre = $pdo->prepare("SELECT razon_social, rif FROM proveedores WHERE id = :proveedor_id");
$stmtNombre->execute([':proveedor_id' => $proveedor_id]);
$persona = $stmtNombre->fetch(PDO::FETCH_ASSOC);
$nombre_completo = $persona ? $persona['razon_social'].' (J-'. $persona['rif'].') de '. $monto['monto'] .'Bs. (ID: '.$factura.')': 'Desconocido';

?>
    <h1>Pagar Factura de <?=$nombre_completo?></h1>
    <div class="form-rest"></div>
    <form class="registro FormularioAjax" method="POST" action="./php/pagar_factura.php" autocomplete="off">

        <?php echo "<input type='hidden' name='factura_id' value='".$factura. "'>";?>

        <label class="" for="monto">Monto a Pagar</label>
        <input class="" type="number" name="monto" pattern="[0-9]{1, 20}" maxlength="20" required>

        <label class="" for="fecha_actualizacion">Fecha de Actualizacion</label>
        <input class="" type="date" name="fecha_actualizacion" pattern="[0-9]{1, 20}" maxlength="20" required>

        <label class="" for="descripcion_pago">Descripcion</label>
        <textarea class="" name="descripcion_pago" maxlength="200"></textarea>
        
    <div class="boton-derecha">
        <input class="" type="submit" value="Ingresar">
    </div>
</div>
