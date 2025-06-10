<?php

require_once "../php/main.php";

//Limpiando Datos y Almacenando
$user = limpiar_cadena($_POST['user']);

//Verificar Datos
if($user == ""){
    echo "<div class='mensaje_error'>
        <p class='mensaje_error__p'>Uno de los campos obligatorios no ha sido llenados</p>
    </div>";
    exit();
}

//Verificando Integridad de los Datos
if(verificar_datos("[a-zA-Z0-9]{3,40}", $user)){
    echo "<div class='mensaje_error'>
        <p class='mensaje_error__p'>El usuario no coincide con el formato solicitado.</p>
    </div>";
    exit();
}

$pdo = conexion();
$check_user = $pdo -> query("SELECT * FROM usuarios WHERE user = '$user'");

if($check_user->rowCount()==1){

    $check_user=$check_user->fetch();

    if($check_user['user']==$user){

        if(headers_sent()){
            echo "<script> window.location.href='../vistas/Verificar_Preguntas.php?user=".$user."'; </script>";
        }else{
            header("Location: ../vistas/Verificar_Preguntas.php?user=".$user."");
        }

    }else{
            echo "<div class='mensaje_error'>
            <p class='mensaje_error__p'>El Usuario no esta registrado</p>
        </div>";
        exit();
    }
}else{
    header("Location: ../vistas/Cambiar_Contraseña.php?error=true");
    exit();
}
$pdo=null;
