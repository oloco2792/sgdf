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
            echo "<td class='registros__td registros__botones'>
                    <form id='' class='confirmacion' method='POST' action='./php/eliminar_deuda.php'>
                        <input type='hidden' name='deuda_id' value='" . htmlspecialchars($deuda['id']) . "'>
            <button class='registros__boton registros__boton--eliminar' type='submit'>".'
                <svg width="40px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M14 10V17M10 10V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            '."</button>
                    </form>
                  </td>";
        } else {
            echo "<td class='registros__td'>Pagada</td>";
        }
        echo "</tr>";
    }

    echo "</tbody></table>";