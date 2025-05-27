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
$check_pass = $check_pass -> query("SELECT user FROM usuarios WHERE pass = '$user'");

if($check_user -> rowCount() == 1){
    $check_user = $check_user->fecth();

    if($check_user['user'] == $user && $check_pass['pass'] == $pass){
        $_SESSION['id'] = $check_user['id'];
        $_SESSION['user'] = $check_user['user'];
        $_SESSION['pass'] = $check_user['pass'];

        if(headers_sent()){
            echo "<script window.location.href='index.php?vista=home';></script>";
        }else{
            header("Location: index.php?vista=home");
    }}
}else{ 
    echo '<p>Usuario o Clave Incorrecta</p>';
};
$check_user = null;