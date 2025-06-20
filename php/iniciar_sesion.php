<?php

//Limpiando Datos y Almacenando
$user = limpiar_cadena($_POST['user']);
$pass = limpiar_cadena($_POST['pass']);

//Verificar Datos
if($user == "" || $pass == ""){
    echo "<div class='mensaje_error'>
        <p class='mensaje_error__p'>Uno de los campos obligatorios no ha sido llenados</p>
    </div>";
    include "./include/login_footer.php";
    exit();
}

//Verificando Integridad de los Datos
if(verificar_datos("[a-zA-Z0-9]{4,12}", $user)){
    echo "<div class='mensaje_error'>
        <p class='mensaje_error__p'>El usuario no coincide con el formato solicitado.</p>
    </div>";
    include "./include/login_footer.php";
    exit();
}

if(verificar_datos("[a-zA-Z0-9]{4,12}", $pass)){
    echo "<div class='mensaje_error'>
        <p class='mensaje_error__p'>La contraseña no coincide con el formato solicitado.</p>
    </div>";
    include "./include/login_footer.php";
    exit();
}

$pdo = conexion();
$check_user = $pdo -> query("SELECT * FROM usuarios WHERE user = '$user'");

if($check_user->rowCount()==1){

    $check_user=$check_user->fetch();

    if($check_user['user']==$user && password_verify($pass, $check_user['pass'])){

        $_SESSION['user'] = $check_user['user'];
        $_SESSION['nivel'] = $check_user['nivel'];

        if(headers_sent()){
            echo "<script> window.location.href='index.php?vistas=Inicio'; </script>";
        }else{
            header("Location: index.php?vistas=Inicio");
        }

    }else{
            echo "<div class='mensaje_error'>
            <p class='mensaje_error__p'>Usuario o Clave Incorrectas</p>
        </div>";
        include "./include/login_footer.php";
        exit();
    }
}else{
    echo "<div class='mensaje_error'>
        <p class='mensaje_error__p'>Ha ocurrido un error inesperado.</p>
    </div>";
    include "./include/login_footer.php";
    exit();
}
$pdo=null;
