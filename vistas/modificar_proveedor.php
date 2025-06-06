<?php
require_once "./php/main.php";
$proveedor_id = $_POST['proveedor_id'];

    $pdo = conexion();
    $stmtNombre = $pdo->prepare("SELECT razonSocial, rif FROM proveedores WHERE id = :proveedor_id");
    $stmtNombre->execute([':proveedor_id' => $proveedor_id]);
    $proveedor = $stmtNombre->fetch(PDO::FETCH_ASSOC);
    $nombre_completo = $proveedor ? $proveedor['razonSocial'] .'(J-'.$proveedor['rif'].')' : 'Desconocido';
?>
<div class="posicion-relativa centrar-vertical">
    <main class="contenedor caja">
    <h1>Modificar datos de <?php echo $nombre_completo ?></h1>
    <div class="form-rest"></div>
    <form class="registro FormularioAjax" method="POST" action="./php/modificar_proveedor.php" autocomplete="off">

        <?php echo "<input class='' type='hidden' name='proveedor_id' value='".$proveedor_id."'>"?>

        <label class="" for="Razon Social">Razon Social</label>
        <input class="" type="text" name="razonSocial" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1, 20}" maxlength="20" required>

        <label class="" for="rif">RIF (J-)</label>
        <input class="" type="number" name="rif" pattern="[0-9]{1, 20}" maxlength="20" required>
        
    <div class="boton-derecha">
        <input class="boton" type="submit" value="Ingresar">
    </div>
    </form>
    </main>
</div>