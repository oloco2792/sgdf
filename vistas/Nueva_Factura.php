<?php require_once './php/main.php';?>

<h1>Registrar Factura</h1>
<div class="form-rest"></div>
<form class="registro FormularioAjax" method="POST" action="./php/registrar_factura.php" autocomplete="off">
    <div class="registro__nuevo">
        
    <?php 
    
    if(isset($_POST['proveedor_id'])){
        $proveedor_id = limpiar_cadena($_POST['proveedor_id']);

        $pdo = conexion();

            $stmt = $pdo->prepare("SELECT razon_social, rif FROM proveedores WHERE id = :id");
            $stmt->execute([':id' => $proveedor_id]);
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
        echo '<label class="datosNombres input_" for="razon_social">Razon Social</label>
        <input class="activarInput" type="text" name="razon_social" pattern="[a-zA-Z. ]{4, 20}" maxlength="40" value='.$resultado['razon_social'].' required>
    
        <label class="datosNombres" for="rif">RIF(J-)</label>
        <input class="activarInput" type="text" name="rif" pattern="[0-9]{4, 20}" maxlength="20" value="'.$resultado['rif'].'" required>';
            }
    }else{
    echo '<label class="datosNombres" for="razon_social">Razon Social</label>
        <input class="activarInput" type="text" name="razon_social" pattern="[a-zA-Z. ]{4, 20}" maxlength="40" required>
    
        <label class="datosNombres" for="rif">RIF(J-)</label>
        <input class="activarInput" type="text" name="rif" pattern="[0-9]{4, 20}" maxlength="20" required>';
    }
    ?>
    </div>

    <label class="" for="monto">Monto</label>
    <input class="" type="number" name="monto" pattern="[0-9]{1, 20}" maxlength="20" required>

    <label class="" for="fecha">Fecha</label>
    <input class="" type="date" name="fecha" pattern="[0-9]{1, 20}" maxlength="20" required>

    <!--label for="estado">Estado</label>
    <select class="registros__select" name="estado" required>
        <option value="No Pagada"selected>No Pagada</option>
        <option value="Pagada">Pagada</option>    
    </select-->

    <label class="" for="descripcion">Descripcion</label>
    <textarea class="" name="descripcion" pattern="{2, 200}" maxlength="200"></textarea>
    
<?php include "./include/botones_form.php"?>
</form>