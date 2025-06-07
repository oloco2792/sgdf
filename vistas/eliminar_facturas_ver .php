<?php
require_once "./php/main.php";

$proveedor_id = $_POST['proveedor_id'];

    $pdo = conexion();

    // Obtener las deudas de la persona
    $sql = "SELECT * FROM facturas WHERE proveedor_id = :proveedor_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':proveedor_id' => $proveedor_id]);

    $stmtNombre = $pdo->prepare("SELECT nombre, apellido FROM personas WHERE id = :proveedor_id");
    $stmtNombre->execute([':proveedor_id' => $proveedor_id]);
    $persona = $stmtNombre->fetch(PDO::FETCH_ASSOC);
    $nombre_completo = $persona ? $persona['nombre'] .' '. $persona['apellido'] : 'Desconocido';

    echo "<div class='posicion-relativa centrar-vertical'>";
    echo "<main class='contenedor caja'>";
    echo "<h1>Deudas de " . htmlspecialchars($nombre_completo) . "</h1>";
    echo "<table id='miTabla'class='registros__tabla'>";
    echo "<thead>
            <tr>
                <th class='registros__th'>ID Deuda</th>
                <th class='registros__th'>Monto</th>
                <th class='registros__th'>Estado</th>
                <th class='registros__th'>Fecha</th>
                <th class='registros__th'>Descripcion</th>
                <th class='registros__th'>Acciones</th>
            </tr>
          </thead>";
    echo "<tbody>";

    while ($deuda = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td class='registros__td'>" . htmlspecialchars($deuda['id']) . "</td>";
        echo "<td class='registros__td'>" . htmlspecialchars($deuda['monto']) . "</td>";
        echo "<td class='registros__td'>" . htmlspecialchars($deuda['estado']) . "</td>";
        echo "<td class='registros__td'>" . htmlspecialchars($deuda['fecha']) . "</td>";
        echo "<td class='registros__td'>" . htmlspecialchars($deuda['descripcion']) . "</td>";
        
        if ($deuda['estado'] == 'No Pagada') {
            echo "<td class='registros__td'>
                    <form class='FormularioAjax' method='POST' action='./php/eliminar_factura.php'>
                        <input type='hidden' name='factura_id' value='" . htmlspecialchars($deuda['id']) . "'>
                        <button type='submit'>Eliminar</button>
                    </form>
                  </td>";
        } else {
            echo "<td class='registros__td'>Pagada</td>";
        }
        echo "</tr>";
    }

    echo "</tbody></table></main></div>";