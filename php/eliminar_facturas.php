<?php
require_once "main.php";

$pdo = conexion();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Consulta SQL con suma de las deudas vinculadas a cada persona, excluyendo las pagadas
$sql = "SELECT p.*, IFNULL(SUM(d.monto), 0) AS deuda_total
            FROM proveedores p
            LEFT JOIN facturas d ON p.id = d.proveedor_id AND d.estado != 'pagada'
            GROUP BY p.id";

$stmt = $pdo->prepare($sql);
$stmt->execute();

// --- INICIO DE CAPTURA DEL HTML ---
// Inicia el buffer de salida para capturar todo lo que se imprima
ob_start();

// Obtener los nombres de las columnas para crear la cabecera
echo "<table id='miTabla'class='registros__tabla'>";
echo "<thead>";
echo "<tr>";

// Primera fila: columnas de personas
$columns = $stmt->fetch(PDO::FETCH_ASSOC);
if ($columns) {
    foreach ($columns as $columnName => $value) {
        echo "<th class='registros__th'>" . htmlspecialchars($columnName) . "</th>";
    }
    // Agregar cabecera para la columna de "Ver Deudas"
    echo "<th class='registros__th'>Acciones</th>"; // Cabecera para el botón "Ver Deudas"
}
echo "</tr>";
echo "</thead>";

echo "<tbody>";

// Re-ejecutar la consulta para recorrer los datos desde el inicio
$stmt->closeCursor();
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    // Mostrar todas las columnas excepto 'deuda_total'
    foreach ($row as $column => $value) {
        if ($column !== 'deuda_total') {
            echo "<td class='registros__td'>" . htmlspecialchars($value) . "</td>";
        }
    }
    // Mostrar la deuda total en la última columna
    echo "<td class='registros__td'>" . htmlspecialchars($row['deuda_total']) . "</td>";

    // Añadir el botón para ver las deudas de esa persona
    echo "<td class='registros__td'>
                <form method='POST' action='index.php?vistas=eliminar_facturas_ver'>
                    <input type='hidden' name='proveedor_id' value='" . htmlspecialchars($row['id']) . "'>
                    <button type='submit'>Ver factura</button>
                </form>
            </td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";

// Captura todo el HTML impreso desde ob_start()
$html_tabla = ob_get_clean();
// --- FIN DE CAPTURA DEL HTML ---

// Ahora, el formulario para generar el PDF enviará el HTML capturado
echo '<form method="POST" action="./php/generar_pdf_deudas.php">';
echo '<input type="hidden" name="html_content" value="' . htmlspecialchars($html_tabla) . '">';
echo '<button class="boton" type="submit">Generar PDF</button>';
echo '</form>';

// Opcional: Si aún quieres mostrar la tabla en la página, puedes hacer un echo aquí
echo $html_tabla;
?>