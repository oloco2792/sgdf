<?php require_once 'include/session_start.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/head.php';?>
</head>
<body style="display: flex; flex-direction: column; justify-content: space-between">
    <?php
    if(!isset($_GET["vistas"]) || $_GET["vistas"]==""){
        $_GET["vistas"] = "login";
    }

    if(is_file("./vistas/".$_GET["vistas"].".php") && $_GET["vistas"]!="login" && $_GET["vistas"]!="404"){
        
        //Cerrar Sesion
        if(!isset($_SESSION['user'])){
            include "./vistas/logout.php";
            exit();
        }
        
        include "./include/navbar.php";

        include "./vistas/".$_GET["vistas"].".php";

        include "./include/script.php";

        include "./include/footer.php";

    }else{
        if($_GET["vistas"]=="login"){
            include "./vistas/login.php";
        }else{
            include "./vistas/404.php";
        }
    }
    ?>

</body>
</html>