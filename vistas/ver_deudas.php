<h1>Deudas</h1>
<?php
require_once "./php/main.php";

$pdo = conexion();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Consulta SQL con suma de las deudas vinculadas a cada persona, excluyendo las pagadas
$sql = "SELECT p.*, IFNULL(SUM(d.monto_actual), 0) AS deuda_total
            FROM personas p
            LEFT JOIN deudas d ON p.id = d.persona_id AND d.estado != 'pagada'
            GROUP BY p.id";

$stmt = $pdo->prepare($sql);
$stmt->execute();

ob_start();

echo "<table id='miTabla'class='registros__tabla'>";
echo "<thead>";
echo "<tr>";

    echo "<th class='registros__th'>ID</th>";
    echo "<th class='registros__th'>Nombre</th>";
    echo "<th class='registros__th'>Apellido</th>";
    echo "<th class='registros__th'>Cedula</th>";
    echo "<th class='registros__th'>Monto Total</th>";
    echo "<th class='registros__th'>Acciones</th>";

echo "</tr>";
echo "</thead>";

echo "<tbody>";

$stmt->closeCursor();
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    foreach ($row as $column => $value) {
        if ($column !== 'deuda_total') {
            echo "<td class='registros__td'>" . htmlspecialchars($value) . "</td>";
        }
    }
    echo "<td class='registros__td'>" . htmlspecialchars($row['deuda_total']) . "</td>";

    include "./include/botones_accion.php";

    echo "</tr>";
}

echo "</tbody>";
echo "</table>";

$html_tabla = ob_get_clean();

include "./include/botones_listas.php";

echo $html_tabla;
?>                 

