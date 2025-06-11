<?php
require_once "./php/main.php";

$persona_id = $_POST['persona_id'];

    $pdo = conexion();

    // Obtener las deudas de la persona
    $sql = "SELECT * FROM deudas WHERE persona_id = :persona_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':persona_id' => $persona_id]);

    $stmtNombre = $pdo->prepare("SELECT nombre, apellido FROM personas WHERE id = :persona_id");
    $stmtNombre->execute([':persona_id' => $persona_id]);
    $persona = $stmtNombre->fetch(PDO::FETCH_ASSOC);
    $nombre_completo = $persona ? $persona['nombre'] .' '. $persona['apellido'] : 'Desconocido';

    echo "<h1>Deudas de " . htmlspecialchars($nombre_completo) . "</h1>";

    ob_start();

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
        $fecha_formateada = date('d-m-Y', strtotime($deuda['fecha']));
            echo "<td class='registros__td'>" . htmlspecialchars($fecha_formateada) . "</td>";
        echo "<td class='registros__td'>" . htmlspecialchars($deuda['descripcion']) . "</td>";
    
        echo "<td class='registros__td registros__botones'>
                <form method='POST' action='index.php?vistas=Modificar_Deuda'>
                    <input type='hidden' name='deuda_id' value='" . htmlspecialchars($deuda['id']) . "'>
                    <input type='hidden' name='persona_id' value='" . $persona_id . "'>
                <button class='registros__boton registros__boton--modificar' type='submit'>".'
                    <svg width="40px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                <path d="M1 22C1 21.4477 1.44772 21 2 21H22C22.5523 21 23 21.4477 23 22C23 22.5523 22.5523 23 22 23H2C1.44772 23 1 22.5523 1 22Z" fill="#0F0F0F"/>                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3056 1.87868C17.1341 0.707107 15.2346 0.707107 14.063 1.87868L3.38904 12.5526C2.9856 12.9561 2.70557 13.4662 2.5818 14.0232L2.04903 16.4206C1.73147 17.8496 3.00627 19.1244 4.43526 18.8069L6.83272 18.2741C7.38969 18.1503 7.89981 17.8703 8.30325 17.4669L18.9772 6.79289C20.1488 5.62132 20.1488 3.72183 18.9772 2.55025L18.3056 1.87868ZM15.4772 3.29289C15.8677 2.90237 16.5009 2.90237 16.8914 3.29289L17.563 3.96447C17.9535 4.35499 17.9535 4.98816 17.563 5.37868L15.6414 7.30026L13.5556 5.21448L15.4772 3.29289ZM12.1414 6.62869L4.80325 13.9669C4.66877 14.1013 4.57543 14.2714 4.53417 14.457L4.0014 16.8545L6.39886 16.3217C6.58452 16.2805 6.75456 16.1871 6.88904 16.0526L14.2272 8.71448L12.1414 6.62869Z" fill="#0F0F0F"/></svg>
                '."</button>
                </form>
                </td>";
        echo "</tr>";
    }

    echo "</tbody></table>";

    $html_tabla = ob_get_clean();

    include "./include/botones_listas.php";

    echo $html_tabla;