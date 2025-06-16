<?php
$vistas = $_GET['vistas'];
echo '<div class="botones">';
if($vistas=="Ver_Deudas"){
echo '<form method="POST" action="./php/generar_pdf_deudas_completas.php">
        <input type="hidden" name="html_content" value="' . htmlspecialchars($html_tabla) . '">
        <button class="boton" type="submit">Generar PDF</button>
    </form>';
}else if($vistas=="Deudas_Detalladas"){
echo '<form method="POST" action="./php/generar_pdf_deudas_detalladas.php">
        <input type="hidden" name="html_content" value="' . htmlspecialchars($html_tabla) . '">
        <input type="hidden" name="nombre_completo" value="' .$nombre_completo. '">
        <button class="boton" type="submit">Generar PDF</button>
    </form>';
}else if($vistas=="Ver_Facturas"){
echo '<form method="POST" action="./php/generar_pdf_facturas_completas.php">
        <input type="hidden" name="html_content" value="' . htmlspecialchars($html_tabla) . '">
        <button class="boton" type="submit">Generar PDF</button>
    </form>';   
}else if ($vistas=="Facturas_Detalladas"){
echo '<form method="POST" action="./php/generar_pdf_facturas_detalladas.php">
        <input type="hidden" name="html_content" value="' . htmlspecialchars($html_tabla) . '">
        <input type="hidden" name="nombre_completo" value="' .$nombre_completo. '">
        <button class="boton" type="submit">Generar PDF</button>
    </form>';
}else if ($vistas=="Ver_Personas"){
echo '<form method="POST" action="./php/generar_pdf_personas.php">
        <input type="hidden" name="html_content" value="' . htmlspecialchars($html_tabla) . '">
        <button class="boton" type="submit">Generar PDF</button>
    </form>';
}else if ($vistas=="Ver_Proveedores"){
echo '<form method="POST" action="./php/generar_pdf_proveedores.php">
        <input type="hidden" name="html_content" value="' . htmlspecialchars($html_tabla) . '">
        <button class="boton" type="submit">Generar PDF</button>
    </form>';
}


if($vistas=="Ver_Deudas"){
    echo '<button class="boton" id="boton" type="button">Crear Deuda</button>';
}else if($vistas=="Deudas_Detalladas"){
echo '<form method="POST" action="index.php?vistas=Nueva_Deuda">
        <input type="hidden" name="persona_id" value="' . $persona_id . '">
        <button class="boton" type="submit">Crear Deuda</button>
    </form>';
}else if($vistas=="Facturas_Detalladas"){
echo '<form method="POST" action="index.php?vistas=Nueva_Factura">
        <input type="hidden" name="proveedor_id" value="' . $proveedor_id . '">
        <button class="boton" type="submit">Crear Factura</button>
    </form>';
}else if($vistas=="Ver_Facturas"){
    echo '<button class="boton" id="boton" type="button">Crear Factura</button>';
}else if($vistas=="Ver_Personas"){
    echo '<button class="boton" id="boton" type="button">Registrar Persona</button>';
}else if($vistas=="Ver_Proveedores"){
    echo '<button class="boton" id="boton" type="button">Registrar Proveedor</button>';
}else if($vistas=="Ver_Usuarios"){
    echo '<div class="boton-derecha-100">';
    echo '<button class="boton" id="boton" type="button">Crear Usuario</button>';
    echo '</div>';
}
echo '</div>';