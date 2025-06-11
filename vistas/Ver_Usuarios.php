<h1>Ver Usuarios</h1>
<?php
require_once "./php/main.php";

$pdo = conexion();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->prepare("SELECT id, user FROM usuarios");
$stmt->execute();

ob_start();

echo "<table id='miTabla'class='registros__tabla'>";
echo "<thead>";
echo "<tr>";

$columns = $stmt->fetch(PDO::FETCH_ASSOC);
if ($columns) {
    foreach ($columns as $columnName => $value) {
        echo "<th class='registros__th'>" . htmlspecialchars($columnName) . "</th>";
    }
    echo "<th class='registros__th'>Acciones</th>";
}
echo "</tr>";
echo "</thead>";

echo "<tbody>";

$stmt->closeCursor();
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    if ($row['user'] == "admin") {
        continue;
    }

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

