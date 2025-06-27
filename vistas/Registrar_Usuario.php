<?php 

require_once "./php/main.php";

$pdo = conexion();

$stmt1 = $pdo->prepare("SELECT * FROM preguntas1");
$stmt1->execute();

$preguntas1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

$stmt2 = $pdo->prepare("SELECT * FROM preguntas2");
$stmt2->execute();

$preguntas2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

?>

<h1>Registrar Usuario</h1>
<div class="form-rest"></div>
<form class="registro FormularioAjax" method="POST" action="./php/registrar_usuario.php" autocomplete="off">
        
        <label class="datosNombres" for="user">Usuario</label>
        <input class="activarInput" type="text" name="user" pattern="[a-zA-Z0-9]{4, 20}" maxlength="40" required>

        <label class="datosNombres" for="pass">Contraseña</label>
        <input class="activarInput" type="password" name="pass" pattern="[a-zA-Z0-9]{4, 20}" maxlength="40" required>

        <label class="datosNombres" for="pass_confirm">Confirmar Contraseña</label>
        <input class="activarInput" type="password" name="pass_confirm" pattern="[a-zA-Z0-9]{4, 20}" maxlength="40" required>

        <div class="registro__nuevo--usuario">
            <div style="display: flex; flex-direction: column; gap: 1rem;">
            <label for="estado">Pregunta 1</label>
            <select class="registros__select" name="pregunta_1" required>
                <?php if ($preguntas1) {
                    foreach ($preguntas1 as $fila) {
                        $pregunta_texto = htmlspecialchars($fila['pregunta']);
                        $pregunta_id = htmlspecialchars($fila['id']);
                        echo "<option value=\"{$pregunta_id}\" selected>{$pregunta_texto}</option>";
                    }
                }?>
            </select>
            <input class="activarInput" type="text" name="respuesta_1" pattern="[a-zA-Z0-9]{4, 20}" maxlength="40" required>
            </div>
            <div style="display: flex; flex-direction: column; gap: 1rem;">
            <label for="estado">Pregunta 2</label>
            <select class="registros__select" name="pregunta_2" required>
                <?php if ($preguntas2) {
                    foreach ($preguntas2 as $fila) {
                        $pregunta_texto = htmlspecialchars($fila['pregunta']);
                        $pregunta_id = htmlspecialchars($fila['id']);
                        echo "<option value=\"{$pregunta_id}\" selected>{$pregunta_texto}</option>";
                    }
                }?>
            </select>
            <input class="activarInput" type="text" name="respuesta_2" pattern="[a-zA-Z0-9]{4, 20}" maxlength="40" required>
            </div>
            
        </div>
        <label for="nivel">Nivel de Usuario</label>
            <select class="registros__select" name="nivel" required>
                <option value="1">Administrador</option>
                <option value="0" selected>Usuario</option>
            </select>
    <?php include "./include/botones_form.php"?>
</form>