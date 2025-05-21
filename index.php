<?php require_once 'include/session_start.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/head.php';?>
</head>
<body>
    <?php
    if(!isset($_GET["vistas"]) || $_GET["vistas"]==""){
        $_GET["vistas"] = "login";
    }

    if(is_file("./vistas/".$_GET["vistas"].".php") && $_GET["vistas"]!="login" && $_GET["vistas"]!="404"){
        include "./include/navbar.php";

        include "./vistas/".$_GET["vistas"].".php";

        //include "./vistas/".$_GET["vistas"].".php";
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