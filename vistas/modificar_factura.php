<?php
require_once "./php/main.php";
$factura_id = $_POST['factura_id'];
$proveedor_id = $_POST['proveedor_id'];

    $pdo = conexion();
    $stmtNombre = $pdo->prepare("SELECT razon_social, rif FROM proveedores WHERE id = :proveedor_id");
    $stmtNombre->execute([':proveedor_id' => $proveedor_id]);
    $stmtDeuda = $pdo->prepare("SELECT * FROM facturas WHERE id = :factura_id");
    $stmtDeuda->execute([':factura_id' => $factura_id]);;

    $deuda = $stmtDeuda->fetch(PDO::FETCH_ASSOC);
    $persona = $stmtNombre->fetch(PDO::FETCH_ASSOC);
    $nombre_completo = $persona ? $persona['razon_social'] .' (J-'.$persona['rif'].') de Bs.'.$deuda['monto_inicial'].' (ID: '.$factura_id.')' : 'Desconocido';

?>
<h1>Modificar factura de <?=$nombre_completo?></h1>
<div class="form-rest"></div>
<form class="registro FormularioAjax" method="POST" action="./php/modificar_factura.php" autocomplete="off">

    <input class="" type="hidden" name="factura_id" value="<?=$factura_id?>">    

        <label class="" for="monto_actual">Monto Actual</label>
        <input class="" type="number" name="monto_actual" pattern="[0-9]{1, 20}" maxlength="20" value="<?=$deuda['monto_actual']?>" required>

        <label class="" for="monto_inicial">Monto Inicial</label>
        <input class="" type="number" name="monto_inicial" pattern="[0-9]{1, 20}" maxlength="20" value="<?=$deuda['monto_inicial']?>" required>

        <label class="" for="fecha">Fecha de Registro</label>
        <input class="" type="date" name="fecha" pattern="[0-9]{1, 20}" maxlength="20" value="<?=$deuda['fecha']?>"required>

        <label class="" for="fecha_actualizacion">Fecha de Abono</label>
        <input class="" type="date" name="fecha_actualizacion" pattern="[0-9]{1, 20}" maxlength="20" value="<?=$deuda['fecha_actualizacion']?>" required>

        <label for="estado">Estado</label>
        <select class="registros__select" name="estado" required>
            <?php 

            if($deuda['estado'] == "Pagada"){
                echo '
                    <option value="No Pagada">No Pagada</option>
                    <option value="Pagada" selected>Pagada</option>    
                ';
            }else{
                echo '
                    <option value="No Pagada" selected>No Pagada</option>
                    <option value="Pagada">Pagada</option>    
                ';
            }

            ?>
        </select>

        <label class="" for="descripcion">Descripcion</label>
        <textarea class="" name="descripcion" maxlength="200" value="<?=$deuda['descripcion']?>"></textarea>
    
<?php include_once "./include/botones_form.php" ?>
</form>
