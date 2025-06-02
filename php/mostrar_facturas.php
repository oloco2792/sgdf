<?php
require_once "main.php";

    $pdo = conexion();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT p.*, IFNULL(SUM(d.monto), 0) AS deuda_total
            FROM proveedores p
            LEFT JOIN facturas d ON p.id = d.proveedor_id AND d.estado != 'pagada'
            GROUP BY p.id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    echo "<table class='registros__tabla'>";
    echo "<thead>";
    echo "<tr>";

    $columns = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($columns) {
        foreach ($columns as $columnName => $value) {
            echo "<th class='registros__th'>" . htmlspecialchars($columnName) . "</th>";
        }
       
        echo "<th class='registros__th'>Ver Facturas</th>";
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
                <form method='POST' action='index.php?vistas=facturas_proveedor'>
                    <input type='hidden' name='proveedor_id' value='" . htmlspecialchars($row['id']) . "'>
                    <button type='submit'>Ver Facturas</button>
                </form>
              </td>";

        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";

?>