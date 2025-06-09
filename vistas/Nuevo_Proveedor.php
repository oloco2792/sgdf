<h1>Registrar Proveedor</h1>
<div class="form-rest"></div>
<form class="registro FormularioAjax" method="POST" action="./php/registrar_proveedor.php" autocomplete="off">
        
        <label class="datosNombres" for="razon_social">Razon Social</label>
        <input class="activarInput" type="text" name="razon_social" pattern="[a-zA-Z. ]{4, 20}" maxlength="40" required>
    
        <label class="datosNombres" for="rif">RIF (J-)</label>
        <input class="activarInput" type="text" name="rif" pattern="[0-9]{4, 20}" maxlength="20" required>
   
    <?php include "./include/botones_form.php"?>
</form>