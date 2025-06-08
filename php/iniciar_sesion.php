<?php

//Limpiando Datos y Almacenando
$user = limpiar_cadena($_POST['user']);
$pass = limpiar_cadena($_POST['pass']);

//Verificar Datos
if($user == "" || $pass == ""){
    echo '<p>Uno de los campos obligatorios no ha sido llenados</p>';
    exit();
}

//Verificando Integridad de los Datos
if(verificar_datos("[a-zA-Z0-9]{3,40}", $user)){
    echo "<p>El Usuario no coincide con el formato solicitado</p>";
    exit();
}

if(verificar_datos("[a-zA-Z0-9]{3,40}", $pass)){
    echo "<p>La contraseña no coincide con el formato solicitado</p>";
    exit();
}

$check_user = conexion();
$check_user = $check_user -> query("SELECT user FROM usuarios WHERE user = '$user'");

$check_pass = conexion();
$check_pass = $check_pass -> query("SELECT pass FROM usuarios WHERE pass = '$pass'");

if($check_user -> rowCount() == 1 && $check_pass -> rowCount() == 1){
    $check_user = $check_user->fetch();
    $check_pass = $check_pass->fetch();

    if($check_user['user'] == $user && $check_pass['pass'] == $pass){
        $_SESSION['user'] = $check_user['user'];
        $_SESSION['pass'] = $check_pass['pass'];

        if(headers_sent()){
            echo "<script window.location.href='index.php?vistas=Inicio';></script>";
        }else{
            header("Location: index.php?vistas=Inicio");
    }}
}else{ 
    echo "<div class='mensaje_error'>
    <p class='mensaje_error__p'>Usuario o Clave Incorrecta</p>
    </div>";
};
$check_user = null;
$check_pass = null;