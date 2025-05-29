<?php
require_once "main.php";

try {
    $pdo = conexion();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL con suma de las deudas vinculadas a cada persona
    $sql = "SELECT p.*, IFNULL(SUM(d.monto), 0) AS deuda_total
            FROM personas p
            LEFT JOIN deudas d ON p.id = d.persona_id
            GROUP BY p.id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Obtener los nombres de las columnas para crear la cabecera
    echo "<table class='registros__tabla'>";
    echo "<thead>";
    echo "<tr>";

    $columns = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($columns) {
        foreach ($columns as $columnName => $value) {
            echo "<th class='registros__th'>" . htmlspecialchars($columnName) . "</th>";
        }
        // Agregar la cabecera para la deuda total
        echo "<th class='registros__th'>Deuda Total</th>";
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
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>