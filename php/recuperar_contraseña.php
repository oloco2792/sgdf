<?php
    require_once "main.php";

    $pregunta1 = limpiar_cadena($_POST['pregunta1']);
    $pregunta2 = limpiar_cadena($_POST['pregunta2']);

    if (verificar_datos("\d{4}-\d{2}-\d{2}", $pregunta1)) {
        echo "<div class='mensaje_error'>
            <p class='mensaje_error__p'>La pregunta N°1 no coincide con el formato solicitado</p>
        </div>";
        exit();
    }

    if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $pregunta2)) {
        echo "<div class='mensaje_error'>
            <p class='mensaje_error__p'>La pregunta N°2 no coincide con el formato solicitado</p>
        </div>";
        exit();
    }

    $check_pregunta1 = conexion();
    $check_pregunta1 = $check_pregunta1 -> query("SELECT pregunta_1 FROM preguntas WHERE pregunta_1 = '$pregunta1'");

    $check_pregunta2 = conexion();
    $check_pregunta2 = $check_pregunta2 -> query("SELECT pregunta_2 FROM preguntas WHERE pregunta_2 = '$pregunta2'");

    if($check_pregunta1 -> rowCount() == 1 && $check_pregunta2 -> rowCount() == 1){
    $check_pregunta1 = $check_pregunta1->fetch();
    $check_pregunta2 = $check_pregunta2->fetch();

    if($check_pregunta1['pregunta_1'] == $pregunta1 && $check_pregunta2['pregunta_2'] == $pregunta2){

        if(headers_sent()){
            echo "<script window.location.href='../vistas/cambiar_contraseña.php';></script>";
        }else{
            header("Location: ../vistas/cambiar_contraseña.php");
    }}
    }else{ 
        echo "<div class='mensaje_error'>
        <p class='mensaje_error__p'>Una de las respuestas introducidas no son correctas</p>
        </div>";
    };


    $check_pregunta1 = null;
    $check_pregunta2 = null;

    $pdo = null;
?>