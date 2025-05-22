<?php
require_once "main.php";

//Almacenar Deudas
$nombre = limpiar_cadena($_POST['nombre']);
$apellido = limpiar_cadena($_POST['apellido']);
$apodo = limpiar_cadena($_POST['apodo']);
$monto = limpiar_cadena($_POST['monto']);

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

//Guardar Persona
$guardar_persona = conexion();
$guardar_persona = $guardar_persona -> query("INSERT INTO personas (nombre, apellido, apodo) VALUES('$nombre', '$apellido', '')");


$guardar_persona = null;

