<?php
require_once "main.php";

$user = limpiar_cadena($_POST['user']);
$pregunta_1 = limpiar_cadena($_POST['pregunta1']);
$pregunta_2 = limpiar_cadena($_POST['pregunta2']);

if ($user === "" || $pregunta_1 === "" || $pregunta_2 === "") {
echo "<div class='mensaje_error'>
<p class='mensaje_error__p'>Uno de los campos obligatorios no ha sido llenado.</p>
</div>";
    exit();
}

$pdo = conexion();

$stmt = $pdo->prepare("SELECT respuesta_1, respuesta_2 FROM usuarios WHERE user = :user");
$stmt->execute([":user" => $user]);
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

$respuesta_1 = $resultado['respuesta_1'];
$respuesta_2 = $resultado['respuesta_2'];

if($pregunta_1 === $respuesta_1 && $pregunta_2 === $respuesta_2){

        if(headers_sent()){
            echo "<script> window.location.href='../vistas/Nueva_Contraseña.php?user=".$user."'; </script>";
        }else{
            header("Location: ../vistas/Nueva_Contraseña.php?user=".$user."");
        }
    }else{
header("Location: ../vistas/Verificar_Preguntas.php?user=".$user."&error_pregunta=true");
        exit();
    }
$pdo=null;
?>