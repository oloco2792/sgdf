<?php
function titulo($cadena){
$vista = $_GET['vistas'];
$vista_formateada = '';
if($vista == ""){
    exit;
}
if(preg_match("/_/i", $cadena)){
    $vista_formateada = $cadena;
    $vista_formateada = str_replace("_", " ", $cadena);
    strtoupper($vista_formateada);
}else{
    $vista_formateada = $cadena;
    strtoupper($vista_formateada);
}
return $vista_formateada;
}

if(isset($_GET['vistas'])){
    echo "<title>".titulo($_GET['vistas'])."</title>";
}

