<?php
require_once "main.php";

    $razonSocial = limpiar_cadena($_POST['razonSocial']);
    $rif = limpiar_cadena($_POST['rif']);
    $monto = limpiar_cadena($_POST['monto']);
    $fecha = limpiar_cadena($_POST['fecha']);
    $estado = limpiar_cadena($_POST['estado']);
    $descripcion = limpiar_cadena($_POST['descripcion']);

    if ($razonSocial == "" || $rif == "" || $monto == "" || $estado == "") {
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>Uno de los campos obligatorios no ha sido llenado</p>
    </div>";
        exit();
    }

    if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9. ]{3,40}", $razonSocial)) {
        echo "<div class='mensaje_error'>
        <p class='mensaje_error__p'>El Nombre/Razon Social no coincide con el formato solicitado</p>
        </div>";
        exit();
    }

    if (verificar_datos("[0-9]{3,40}", $rif)) {
        echo "<div class='mensaje_error'>
        <p class='mensaje_error__p'>El RIF no coincide con el formato solicitado</p>
        </div>";
        exit();
    }

    if (verificar_datos("[0-9]{1,40}", $monto)) {
        echo "<div class='mensaje_error'>
        <p class='mensaje_error__p'>El Monto no coincide con el formato solicitado</p>
        </div>";
        exit();
    }

    $pdo = conexion();

    $stmt = $pdo->prepare("SELECT id FROM proveedores WHERE razonSocial = :razonSocial AND rif = :rif");
    $stmt->execute([
        ':razonSocial' => $razonSocial,
        ':rif' => $rif
    ]);

    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id_deudor = $row['id'];
    } else {
        $stmt_insert = $pdo->prepare("INSERT INTO proveedores (razonSocial, rif) VALUES (:razonSocial, :rif)");
        $stmt_insert->execute([':razonSocial' => $razonSocial, ':rif' => $rif]);

        $id_deudor = $pdo->lastInsertId();
    }

    $fecha_formateada = date('Y-m-d', strtotime($fecha));

    $stmt_deuda = $pdo->prepare("INSERT INTO facturas(proveedor_id, monto, fecha, estado, descripcion, fecha_actualizacion, descripcion_pago) VALUES (:proveedor_id, :monto, :fecha, :estado, :descripcion, '', '')");
    $stmt_deuda->execute([
        ':proveedor_id' => $id_deudor,
        ':monto' => $monto,
        ':fecha' => $fecha_formateada,
        ':estado' => $estado,
        ':descripcion' => $descripcion
    ]);

    echo "<div class='mensaje_exito'>
    <p class='mensaje_exito__p'>La factura se ha registrado correctamente.</p>
    </div>";

    $stmt = $pdo->prepare("SELECT id, razonSocial, rif FROM proveedores");
    $stmt->execute();

    $personas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;