<?php
require_once "./php/main.php";
$deuda_id = $_POST['deuda_id'];
$persona_id = $_POST['persona_id'];

    $pdo = conexion();
    $stmtNombre = $pdo->prepare("SELECT * FROM personas WHERE id = :persona_id");
    $stmtNombre->execute([':persona_id' => $persona_id]);
    $stmtDeuda = $pdo->prepare("SELECT * FROM deudas WHERE persona_id = :persona_id");
    $stmtDeuda->execute([':persona_id' => $persona_id]);

    $persona = $stmtNombre->fetch(PDO::FETCH_ASSOC);
    $deuda = $stmtDeuda->fetch(PDO::FETCH_ASSOC);

    $nombre_completo = $persona ? $persona['nombre'] .' '. $persona['apellido'] .' (V-'.$persona['cedula'].') de '.$deuda['monto_inicial'].'Bs. (ID: '. $deuda_id . ')': 'Desconocido';
?>
    <h1>Modificar deuda de <?=$nombre_completo?></h1>
    <div class="form-rest"></div>
    <form class="registro FormularioAjax" method="POST" action="./php/modificar_deuda.php" autocomplete="off">

        <input class="" type="hidden" name="deuda_id" value="<?=$deuda_id?>">    

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
