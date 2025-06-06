<?php
    require_once "main.php";

    $passNew = limpiar_cadena($_POST['passNew']);
    $passNewVerif = limpiar_cadena($_POST['passNewVerif']);

    if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9]{3,40}", $passNew)) {
        echo "<div class='mensaje_error'>
            <p class='mensaje_error__p'>La nueva contraseña no coincide con el formato solicitado</p>
        </div>";
        exit();
    }

    if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9]{3,40}", $passNewVerif)) {
        echo "<div class='mensaje_error'>
            <p class='mensaje_error__p'>La verificacion de contraseña no coincide con el formato solicitado</p>
        </div>";
        exit();
    }

    if ($passNew !== $passNewVerif ||  $passNewVerif !== $passNew) {
        echo "<div class='mensaje_error'>
            <p class='mensaje_error__p'>Ambas contraseñas no coinciden</p>
        </div>";
        exit();
    }

    $check_pass = conexion();
    $check_pass = $check_pass -> query("UPDATE usuarios SET pass = '$passNew' WHERE id = '1'");

    echo "<div class='mensaje_exito'>
        <p class='mensaje_exito__p'>La contraseña se ha registrado correctamente.</p>
    </div>";


    $check_pass = null;

    /**if($check_pass['pass'] == $pregunta1 && $check_pregunta2['pregunta_2'] == $pregunta2){

        if(headers_sent()){
            echo "<script window.location.href='../vistas/cambiar_contraseña.php';></script>";
        }else{
            header("Location: ../vistas/cambiar_contraseña.php");
    }}
    }else{ 
        echo "<div class='mensaje_error'>
        <p class='mensaje_error__p'>Ha ocurrido un error</p>
        </div>";
    };**/

?>