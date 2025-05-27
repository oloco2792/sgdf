<?php

require_once "main.php";

$stmt = conexion();
$stmt = $stmt->prepare("SELECT id, nombre, apellido FROM personas");
$stmt -> execute();

$personas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>