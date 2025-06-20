<?php
require_once "./php/main.php";
$proveedor_id = $_POST['proveedor_id'];

    $pdo = conexion();
    $stmtNombre = $pdo->prepare("SELECT razon_social, rif FROM proveedores WHERE id = :proveedor_id");
    $stmtNombre->execute([':proveedor_id' => $proveedor_id]);
    $persona = $stmtNombre->fetch(PDO::FETCH_ASSOC);
    $nombre_completo = $persona ? $persona['razon_social'] .' (J-'.$persona['rif'].')' : 'Desconocido';
?>
<h1>Modificar Registro de <?=$nombre_completo?></h1>
    <div class="form-rest"></div>
    <form class="registro FormularioAjax" method="POST" action="./php/modificar_proveedor.php" autocomplete="off">
            
        <input class="activarInput" type="hidden" name="proveedor_id" value="<?=$proveedor_id?>" required>

            <label class="datosNombres" for="razon_social">Razon Social</label>
            <input class="activarInput" type="text" name="razon_social" pattern="[a-zA-Z]{4, 20}" maxlength="20" value="<?=$persona['razon_social']?>" required>
    
            <label class="" for="rif">RIF (J-)</label>
            <input class="" type="number" name="rif" pattern="[0-9]{1, 20}" maxlength="20" value="<?=$persona['rif']?>" required>
        
        <?php include_once "./include/botones_form.php" ?>
    </form>

</main>
</div>