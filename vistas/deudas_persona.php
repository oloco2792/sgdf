<?php
require_once "./php/main.php";

$persona_id = $_POST['persona_id'];

try {
    $pdo = conexion();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtener las deudas de la persona
    $sql = "SELECT * FROM deudas WHERE persona_id = :persona_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':persona_id' => $persona_id]);
	echo "<div class='posicion-relativa centrar-vertical'>";
	echo "<main class='contenedor caja'>";
    echo "<h2>Deudas para la persona ID: " . htmlspecialchars($persona_id) . "</h2>";
    echo "<table class='deudas__tabla'>";
    echo "<thead>
            <tr>
                <th class='registros__th'>ID Deuda</th>
                <th class='registros__th'>Monto</th>
                <th class='registros__th'>Estado</th>
                <th class='registros__th'>Acciones</th>
            </tr>
          </thead>";
    echo "<tbody>";

    while ($deuda = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td class='registros__td'>" . htmlspecialchars($deuda['id']) . "</td>";
        echo "<td class='registros__td'>" . htmlspecialchars($deuda['monto']) . "</td>";
        echo "<td class='registros__td'>" . htmlspecialchars($deuda['estado']) . "</td>";
		
        if ($deuda['estado'] === 'no pagada') {
            echo "<td class='registros__td'>
                    <form method='POST' action='pagar_deuda.php'>
                        <input type='hidden' name='deuda_id' value='" . htmlspecialchars($deuda['id']) . "'>
                        <button type='submit'>Pagar</button>
                    </form>
                  </td>";
        } else {
            echo "<td>Pagada</td>";
        }
        echo "</tr>";
    }

    echo "</tbody></table></main></div>";
	/**echo ;
	echo "";**/

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>