<?php
echo '<div class="botones">';
echo '<form method="POST" action="./php/generar_pdf_deudas.php">
        <input type="hidden" name="html_content" value="' . htmlspecialchars($html_tabla) . '">
        <button class="boton" type="submit">Generar PDF</button>
    </form>';
$vistas = $_GET['vistas'];
if($vistas=="Ver_Deudas" || $vistas=="Modificar_Deudas_Registros"){
        echo '<button class="boton" id="boton" type="button">Crear Deuda</button>';
}
echo '</div>';