<h1>Proveedores</h1>
<?php
require_once "./php/main.php";

$pdo = conexion();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->prepare("SELECT * FROM proveedores");
$stmt->execute();

ob_start();

echo "<table id='miTabla'class='registros__tabla'>";
echo "<thead>";
echo "<tr>";

    echo "<th class='registros__th'>ID</th>";
    echo "<th class='registros__th'>Razon Social</th>";
    echo "<th class='registros__th'>RIF</th>";
    echo "<th class='registros__th'>Acciones</th>";
echo "</tr>";
echo "</thead>";

echo "<tbody>";

$stmt->closeCursor();
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    foreach ($row as $column => $value) {
        echo "<td class='registros__td'>" . htmlspecialchars($value) . "</td>";
    }

    include "./include/botones_accion.php";

    echo "</tr>";
}

echo "</tbody>";
echo "</table>";

$html_tabla = ob_get_clean();

include "./include/botones_listas.php";

echo $html_tabla;
?>                 

