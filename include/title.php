<?php

$vista = $_GET['vistas'];

function titulo($cadena){
$vista_formateada = '';
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

echo "<title>".titulo($vista)."</title>";
