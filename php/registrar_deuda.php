<?php
require_once "main.php";

    $nombre = limpiar_cadena($_POST['nombre']);
    $apellido = limpiar_cadena($_POST['apellido']);
    $apodo = limpiar_cadena($_POST['apodo']);
    $monto = limpiar_cadena($_POST['monto']);
    $fecha = limpiar_cadena($_POST['fecha']);
    $estado = limpiar_cadena($_POST['estado']);
    $descripcion = limpiar_cadena($_POST['descripcion']);

    if ($nombre == "" || $apellido == "" || $monto == "" || $estado = "") {
        echo 'Uno de los campos obligatorios no ha sido llenado';
        exit();
    }

    if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $nombre)) {
        echo "El Nombre no coincide con el formato solicitado";
        exit();
    }

    if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $apellido)) {
        echo "El Apellido no coincide con el formato solicitado";
        exit();
    }
    if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{3,40}", $apodo)) {
        echo "El Apodo no coincide con el formato solicitado";
        exit();
    }
    if (verificar_datos("[0-9]{3,40}", $monto)) {
        echo "El Monto no coincide con el formato solicitado";
        exit();
    }

    $pdo = conexion();

    $stmt = $pdo->prepare("SELECT id FROM personas WHERE nombre = :nombre AND apellido = :apellido");
    $stmt->execute([':nombre' => $nombre, ':apellido' => $apellido]);

    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id_deudor = $row['id'];
    }else{
        $stmt_insert = $pdo->prepare("INSERT INTO personas (nombre, apellido, apodo) VALUES (:nombre, :apellido, :apodo)");
        $stmt_insert->execute([':nombre' => $nombre, ':apellido' => $apellido, ':apodo' => $apodo]);

        $id_deudor = $pdo->lastInsertId();
    }

    $fecha_formateada = date('Y-m-d', strtotime($fecha));

    $stmt_deuda = $pdo->prepare("INSERT INTO deudas (persona_id, monto, fecha, estado, descripcion, fecha_actualizacion) VALUES (:persona_id, :monto, :fecha, :estado, :descripcion, '')");
    $stmt_deuda->execute([
        ':persona_id' => $id_deudor,
        ':monto' => $monto,
        ':fecha' => $fecha_formateada,
        ':estado' => $estado,
        ':descripcion' => $descripcion
    ]);

    echo "La deuda se ha registrado correctamente.";

    $stmt = $pdo->prepare("SELECT id, nombre, apellido FROM personas");
    $stmt->execute();

    $personas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;
