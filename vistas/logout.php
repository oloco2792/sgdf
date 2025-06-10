<?php
    session_destroy();

    if(headers_sent()){
            echo "<script window.location.href='index.php?vistas=Login';></script>";
        }else{
            header("Location: index.php?vistas=Login");
    }