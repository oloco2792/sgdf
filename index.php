<?php require_once 'include/session_start.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/head.php';?>
    <?php include 'include/title.php';?>
</head>
<body style="display: flex; flex-direction: column; justify-content: space-between">
    <?php
    if(!isset($_GET["vistas"]) || $_GET["vistas"]==""){
        $_GET["vistas"] = "login";
    }
    if(is_file("./vistas/".$_GET["vistas"].".php") && $_GET["vistas"]!="Login" && $_GET["vistas"]!="404"){
                
        //Cerrar Sesion
        if(!isset($_SESSION['user'])){
            include "./vistas/logout.php";
            exit();
        }

        if($_SESSION['nivel']!==1
        &&(
        $_GET['vistas']=="modificar_deuda" ||
        $_GET['vistas']=="modificar_factura" ||
        $_GET['vistas']=="modificar_proveedor" ||
        $_GET['vistas']=="modificar_persona" ||
        $_GET['vistas']=="respaldar_db"
        )){
            $_GET['vistas'] = "home";
        }
        
        include "./include/navbar.php";

        echo '<div class="posicion-relativa centrar-vertical">';
        
        if($_GET['vistas'] !== "Inicio"){
            echo '<main class="contenedor caja">';
        }else{
            echo '<main class="contenedor">';
        }
        include "./vistas/".$_GET["vistas"].".php";

        include "./include/script.php";

        echo '</main>';
        echo '</div>';


        include "./include/footer.php";

    }else{
        if($_GET["vistas"]=="Login"){
            include "./vistas/Login.php";
        }else{
            include "./vistas/404.php";
        }
    }
    ?>
</body>
</html>