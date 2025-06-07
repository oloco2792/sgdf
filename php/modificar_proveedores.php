<?php
require_once "main.php";

$pdo = conexion();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Consulta SQL para obtener nombre, apellido, cedula y el total de deuda
$sql = "SELECT p.id, p.razonSocial, p.rif,
               IFNULL(SUM(d.monto), 0) AS deuda_total
        FROM proveedores p
        LEFT JOIN facturas d ON p.id = d.proveedor_id AND d.estado != 'pagada'
        GROUP BY p.id, p.razonSocial, p.rif";

$stmt = $pdo->prepare($sql);
$stmt->execute();

// --- INICIO DE CAPTURA DEL HTML ---
ob_start();

// Crear la cabecera de la tabla con los nombres de las columnas
echo "<table id='miTabla' class='registros__tabla'>";
echo "<thead>";
echo "<tr>";
echo "<th class='registros__th'>Razon Social</th>";
echo "<th class='registros__th'>RIF(J-)</th>";
echo "<th class='registros__th'>Acciones</th>"; // Para el botón de modificar
echo "</tr>";
echo "</thead>";

echo "<tbody>";

// Recorremos los resultados para crear las filas
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    // Mostrar nombre, apellido y cédula
    echo "<td class='registros__td'>" . htmlspecialchars($row['razonSocial']) . "</td>";
    echo "<td class='registros__td'>" . htmlspecialchars($row['rif']) . "</td>";
    // Botón para modificar los datos
    echo "<td class='registros__td'>
            <form method='POST' action='index.php?vistas=modificar_proveedor'>
                <input type='hidden' name='proveedor_id' value='" . htmlspecialchars($row['id']) . "'>
                <button type='submit'>Modificar</button>
            </form>
          </td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";

// Captura todo el HTML impreso desde ob_start()
$html_tabla = ob_get_clean();
// --- FIN DE CAPTURA DEL HTML ---

// Mostrar el formulario para generar PDF (si quieres conservar esa funcionalidad)
echo '<form method="POST" action="./php/generar_pdf_deudas.php">';
echo '<input type="hidden" name="html_content" value="' . htmlspecialchars($html_tabla) . '">';
echo '<button class="boton" type="submit">Generar PDF</button>';
echo '</form>';

// Mostrar la tabla en la página
echo $html_tabla;
?>