<?php
require_once "./php/main.php";
$factura_id = $_POST['factura_id'];
$proveedor_id = $_POST['proveedor_id'];

    $pdo = conexion();
    $stmtNombre = $pdo->prepare("SELECT razon_social, rif FROM proveedores WHERE id = :proveedor_id");
    $stmtNombre->execute([':proveedor_id' => $proveedor_id]);
    $persona = $stmtNombre->fetch(PDO::FETCH_ASSOC);
    $nombre_completo = $persona ? $persona['razon_social'] .' (J-'.$persona['rif'].')' : 'Desconocido';

    $stmtNombre = $pdo->prepare("SELECT monto FROM facturas WHERE id = :factura_id");
    $stmtNombre->execute([':factura_id' => $factura_id]);
    $facturaOld = $stmtNombre->fetch(PDO::FETCH_ASSOC);
    $facturaTitulo = $facturaOld['monto'];
?>
<h1>Modificar factura de <?php echo $nombre_completo ?> de <?php echo $facturaTitulo?>Bs.</h1>
<div class="form-rest"></div>
<form class="registro FormularioAjax" method="POST" action="./php/modificar_factura.php" autocomplete="off">

    <input class="" type="hidden" name="factura_id" value="<?php echo $factura_id ?>">    

    <label class="" for="monto">Monto</label>
    <input class="" type="number" name="monto" pattern="[0-9]{1, 20}" maxlength="20" required>

    <label class="" for="fecha">Fecha</label>
    <input class="" type="date" name="fecha" pattern="[0-9]{1, 20}" maxlength="20" required>

    <label for="estado">Estado</label>
    <select class="registros__select" name="estado" required>
        <option value="No Pagada"selected>No Pagada</option>
        <option value="Pagada">Pagada</option>    
    </select>

    <label class="" for="descripcion">Descripcion</label>
    <textarea class="" name="descripcion" maxlength="200"></textarea>
    
<?php include_once "./include/botones_form.php" ?>
</form>
