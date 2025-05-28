<?php

require_once "main.php";

//Almacenar Deudas
$nombre = limpiar_cadena($_POST['nombre']);
$apellido = limpiar_cadena($_POST['apellido']);
$apodo = limpiar_cadena($_POST['apodo']);
$monto = limpiar_cadena($_POST['monto']);
$fecha = limpiar_cadena($_POST['fecha']);

//Verificar Campos Obligatorios
if($nombre == "" || $apellido == "" || $monto == ""){
    echo 'Uno de los campos obligatorios no ha sido llenados';
    exit();
}

//Verificando Integridad de los Datos
if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ  ]{3,40}", $nombre)){
    echo "El Nombre no coincide con el formato solicitado";
    exit();
}
if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ  ]{3,40}", $apellido)){
    echo "El Apellido no coincide con el formato solicitado";
    exit();
}
if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{3,40}", $nombre)){
    echo "El Apodo no coincide con el formato solicitado";
    exit();
}
if(verificar_datos("[0-9]{3,40}", $monto)){
    echo "El Monto no coincide con el formato solicitado";
    exit();
}

// Verificar existencia de la persona (por nombre y apellido)
$check_persona = conexion();
$stmt = $check_persona->prepare("SELECT id FROM personas WHERE nombre = :nombre AND apellido = :apellido");
$stmt->execute([':nombre' => $nombre, ':apellido' => $apellido]);

if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id_deudor = $row['id'];
} else {
    $insert_persona = conexion();
    $insert_persona = $insert_persona->prepare("INSERT INTO personas (nombre, apellido, apodo) VALUES (:nombre, :apellido, :apodo)");
    $insert_persona->execute([':nombre' => $nombre, ':apellido' => $apellido, ':apodo' => $apodo]);

    $id_deudor = $insert_persona->lastInsertId();
}


$fecha_formateada = date('Y-m-d', strtotime($fecha));

// Inserción en la tabla deudas
$insert_deuda = conexion();
$stmt_deuda = $insert_deuda->prepare("INSERT INTO deudas (persona_id, monto, fecha, estado, descripcion, fecha_actualizacion) VALUES (:persona_id, :monto, :fecha, '', '', '')");
$stmt_deuda->execute([
    ':persona_id' => $id_deudor,
    ':monto' => $monto,
    ':fecha' => $fecha_formateada
]);


//Verificar Existencia de Nombre
$check_persona = conexion();
$check_persona = $check_persona -> query("SELECT nombre FROM personas WHERE nombre = '$nombre'");


if($check_persona -> rowCount() > 0){
    echo'
        <p>Ese nombre ya se encuentra resgitrado</p>
    ';
}
$check_persona = null;

//Verificar Existencia de Apellido

$check_apellido = conexion();
$check_apellido = $check_apellido -> query("SELECT apellido FROM personas WHERE nombre = '$apellido'");

if($check_apellido -> rowCount() > 0){
    echo'
        <p>Esa persona ya se encuentra resgitrada</p>
    ';
}
$check_apellido = null;


//Guardar Persona (y captura el id)
$guardar_persona = conexion();
$guardar_persona = $guardar_persona -> query("INSERT INTO personas (nombre, apellido, apodo) VALUES('$nombre', '$apellido', '$apodo')");
$guardar_persona = null;
$guardar_persona = conexion();
$guardar_persona = $guardar_persona -> query("SELECT LAST_INSERT_ID() AS id");
$resultado = $guardar_persona->fetch(PDO::FETCH_ASSOC);
$id_deudor = $resultado['id'];
define("id_deudor", $id_deudor);
$guardar_persona = null;

//Guardar Deuda
//$fecha_formateada = date('Y-m-d', strtotime($fecha));
$guardar_deuda = conexion();
$guardar_deuda = $guardar_deuda -> query("INSERT INTO deudas (persona_id, monto, fecha, estado, descripcion, fecha_actualizacion) VALUES(".$id_deudor.", '$monto', $fecha, '', '', '')");