<?php
$vistas = $_GET['vistas'];
switch ($_SESSION['user']) {
    case 'admin':
if($vistas == "Ver_Deudas"){
    echo "<td class='registros__td registros__botones'>
            <form method='POST' action='index.php?vistas=Deudas_Detalladas'>
                <input type='hidden' name='persona_id' value='" . htmlspecialchars($row['id']) . "'>
                <button class='registros__boton registros__boton--ver' type='submit'>".
                '<svg width="40px" height="30px" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 1H1V3H3V1Z" fill="#000000"/><path d="M3 5H1V7H3V5Z" fill="#000000"/><path d="M1 9H3V11H1V9Z" fill="#000000"/><path d="M3 13H1V15H3V13Z" fill="#000000"/><path d="M15 1H5V3H15V1Z" fill="#000000"/><path d="M15 5H5V7H15V5Z" fill="#000000"/><path d="M5 9H15V11H5V9Z" fill="#000000"/><path d="M15 13H5V15H15V13Z" fill="#000000"/></svg>'
                ."</button>
            </form>";
    echo "<form method='POST' action='index.php?vistas=Modificar_Deudas_Ver'>
            <input type='hidden' name='persona_id' value='" . htmlspecialchars($row['id']) . "'>
            <button class='registros__boton registros__boton--modificar' type='submit'>".'
                <svg width="40px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                <path d="M1 22C1 21.4477 1.44772 21 2 21H22C22.5523 21 23 21.4477 23 22C23 22.5523 22.5523 23 22 23H2C1.44772 23 1 22.5523 1 22Z" fill="#0F0F0F"/>                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3056 1.87868C17.1341 0.707107 15.2346 0.707107 14.063 1.87868L3.38904 12.5526C2.9856 12.9561 2.70557 13.4662 2.5818 14.0232L2.04903 16.4206C1.73147 17.8496 3.00627 19.1244 4.43526 18.8069L6.83272 18.2741C7.38969 18.1503 7.89981 17.8703 8.30325 17.4669L18.9772 6.79289C20.1488 5.62132 20.1488 3.72183 18.9772 2.55025L18.3056 1.87868ZM15.4772 3.29289C15.8677 2.90237 16.5009 2.90237 16.8914 3.29289L17.563 3.96447C17.9535 4.35499 17.9535 4.98816 17.563 5.37868L15.6414 7.30026L13.5556 5.21448L15.4772 3.29289ZM12.1414 6.62869L4.80325 13.9669C4.66877 14.1013 4.57543 14.2714 4.53417 14.457L4.0014 16.8545L6.39886 16.3217C6.58452 16.2805 6.75456 16.1871 6.88904 16.0526L14.2272 8.71448L12.1414 6.62869Z" fill="#0F0F0F"/></svg>
            '."</button>
            </form>";
    echo "<form method='POST' action='index.php?vistas=Eliminar_Deudas_Ver'>
            <input type='hidden' name='persona_id' value='" . htmlspecialchars($row['id']) . "'>
            <button class='registros__boton registros__boton--eliminar' type='submit'>".'
                <svg width="40px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M14 10V17M10 10V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            '."</button>
            </form>
    </td>";
}

if($vistas == "Ver_Facturas"){
    echo "<td class='registros__td registros__botones'>
            <form method='POST' action='index.php?vistas=Facturas_Detalladas'>
                <input type='hidden' name='proveedor_id' value='" . htmlspecialchars($row['id']) . "'>
                <button class='registros__boton registros__boton--ver' type='submit'>".
                '<svg width="40px" height="30px" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 1H1V3H3V1Z" fill="#000000"/><path d="M3 5H1V7H3V5Z" fill="#000000"/><path d="M1 9H3V11H1V9Z" fill="#000000"/><path d="M3 13H1V15H3V13Z" fill="#000000"/><path d="M15 1H5V3H15V1Z" fill="#000000"/><path d="M15 5H5V7H15V5Z" fill="#000000"/><path d="M5 9H15V11H5V9Z" fill="#000000"/><path d="M15 13H5V15H15V13Z" fill="#000000"/></svg>'
                ."</button>
            </form>";
    echo "<form method='POST' action='index.php?vistas=Modificar_Facturas_Ver'>
            <input type='hidden' name='proveedor_id' value='" . htmlspecialchars($row['id']) . "'>
            <button class='registros__boton registros__boton--modificar' type='submit'>".'
                <svg width="40px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                <path d="M1 22C1 21.4477 1.44772 21 2 21H22C22.5523 21 23 21.4477 23 22C23 22.5523 22.5523 23 22 23H2C1.44772 23 1 22.5523 1 22Z" fill="#0F0F0F"/>                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3056 1.87868C17.1341 0.707107 15.2346 0.707107 14.063 1.87868L3.38904 12.5526C2.9856 12.9561 2.70557 13.4662 2.5818 14.0232L2.04903 16.4206C1.73147 17.8496 3.00627 19.1244 4.43526 18.8069L6.83272 18.2741C7.38969 18.1503 7.89981 17.8703 8.30325 17.4669L18.9772 6.79289C20.1488 5.62132 20.1488 3.72183 18.9772 2.55025L18.3056 1.87868ZM15.4772 3.29289C15.8677 2.90237 16.5009 2.90237 16.8914 3.29289L17.563 3.96447C17.9535 4.35499 17.9535 4.98816 17.563 5.37868L15.6414 7.30026L13.5556 5.21448L15.4772 3.29289ZM12.1414 6.62869L4.80325 13.9669C4.66877 14.1013 4.57543 14.2714 4.53417 14.457L4.0014 16.8545L6.39886 16.3217C6.58452 16.2805 6.75456 16.1871 6.88904 16.0526L14.2272 8.71448L12.1414 6.62869Z" fill="#0F0F0F"/></svg>
            '."</button>
            </form>";
    echo "<form method='POST' action='index.php?vistas=Eliminar_Facturas_Ver'>
            <input type='hidden' name='proveedor_id' value='" . htmlspecialchars($row['id']) . "'>
            <button class='registros__boton registros__boton--eliminar' type='submit'>".'
                <svg width="40px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M14 10V17M10 10V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            '."</button>
            </form>
    </td>";
}

if($vistas == "Ver_Personas"){
    echo "<td class='registros__td registros__botones'>
    <form method='POST' action='index.php?vistas=Modificar_Persona'>
            <input type='hidden' name='persona_id' value='" . htmlspecialchars($row['id']) . "'>
            <button class='registros__boton registros__boton--modificar' type='submit'>".'
                <svg width="40px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                <path d="M1 22C1 21.4477 1.44772 21 2 21H22C22.5523 21 23 21.4477 23 22C23 22.5523 22.5523 23 22 23H2C1.44772 23 1 22.5523 1 22Z" fill="#0F0F0F"/>                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3056 1.87868C17.1341 0.707107 15.2346 0.707107 14.063 1.87868L3.38904 12.5526C2.9856 12.9561 2.70557 13.4662 2.5818 14.0232L2.04903 16.4206C1.73147 17.8496 3.00627 19.1244 4.43526 18.8069L6.83272 18.2741C7.38969 18.1503 7.89981 17.8703 8.30325 17.4669L18.9772 6.79289C20.1488 5.62132 20.1488 3.72183 18.9772 2.55025L18.3056 1.87868ZM15.4772 3.29289C15.8677 2.90237 16.5009 2.90237 16.8914 3.29289L17.563 3.96447C17.9535 4.35499 17.9535 4.98816 17.563 5.37868L15.6414 7.30026L13.5556 5.21448L15.4772 3.29289ZM12.1414 6.62869L4.80325 13.9669C4.66877 14.1013 4.57543 14.2714 4.53417 14.457L4.0014 16.8545L6.39886 16.3217C6.58452 16.2805 6.75456 16.1871 6.88904 16.0526L14.2272 8.71448L12.1414 6.62869Z" fill="#0F0F0F"/></svg>
            '."</button>
            </form>";
    echo "<form class='confirmacion' method='POST' action='./php/eliminar_persona.php'>
            <input type='hidden' name='persona_id' value='" . htmlspecialchars($row['id']) . "'>
            <button class='registros__boton registros__boton--eliminar' type='submit'>".'
                <svg width="40px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M14 10V17M10 10V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            '."</button>
            </form>
    </td>";
}

if($vistas == "Ver_Proveedores"){
    echo "<td class='registros__td registros__botones'>
    <form method='POST' action='index.php?vistas=Modificar_Proveedor'>
            <input type='hidden' name='proveedor_id' value='" . htmlspecialchars($row['id']) . "'>
            <button class='registros__boton registros__boton--modificar' type='submit'>".'
                <svg width="40px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                <path d="M1 22C1 21.4477 1.44772 21 2 21H22C22.5523 21 23 21.4477 23 22C23 22.5523 22.5523 23 22 23H2C1.44772 23 1 22.5523 1 22Z" fill="#0F0F0F"/>                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3056 1.87868C17.1341 0.707107 15.2346 0.707107 14.063 1.87868L3.38904 12.5526C2.9856 12.9561 2.70557 13.4662 2.5818 14.0232L2.04903 16.4206C1.73147 17.8496 3.00627 19.1244 4.43526 18.8069L6.83272 18.2741C7.38969 18.1503 7.89981 17.8703 8.30325 17.4669L18.9772 6.79289C20.1488 5.62132 20.1488 3.72183 18.9772 2.55025L18.3056 1.87868ZM15.4772 3.29289C15.8677 2.90237 16.5009 2.90237 16.8914 3.29289L17.563 3.96447C17.9535 4.35499 17.9535 4.98816 17.563 5.37868L15.6414 7.30026L13.5556 5.21448L15.4772 3.29289ZM12.1414 6.62869L4.80325 13.9669C4.66877 14.1013 4.57543 14.2714 4.53417 14.457L4.0014 16.8545L6.39886 16.3217C6.58452 16.2805 6.75456 16.1871 6.88904 16.0526L14.2272 8.71448L12.1414 6.62869Z" fill="#0F0F0F"/></svg>
            '."</button>
            </form>";
    echo "<form class='confirmacion' method='POST' action='./php/eliminar_usuario.php'>
            <input type='hidden' name='persona_id' value='" . htmlspecialchars($row['id']) . "'>
            <button class='registros__boton registros__boton--eliminar' type='submit'>".'
                <svg width="40px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M14 10V17M10 10V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            '."</button>
            </form>
    </td>";
}

if($vistas == "Ver_Usuarios"){
    echo "<td class='registros__td registros__botones'>
    <form method='POST' action='index.php?vistas=Modificar_Usuario'>
            <input type='hidden' name='usuario_id' value='" . htmlspecialchars($row['id']) . "'>
            <button class='registros__boton registros__boton--modificar' type='submit'>".'
                <svg width="40px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                <path d="M1 22C1 21.4477 1.44772 21 2 21H22C22.5523 21 23 21.4477 23 22C23 22.5523 22.5523 23 22 23H2C1.44772 23 1 22.5523 1 22Z" fill="#0F0F0F"/>                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3056 1.87868C17.1341 0.707107 15.2346 0.707107 14.063 1.87868L3.38904 12.5526C2.9856 12.9561 2.70557 13.4662 2.5818 14.0232L2.04903 16.4206C1.73147 17.8496 3.00627 19.1244 4.43526 18.8069L6.83272 18.2741C7.38969 18.1503 7.89981 17.8703 8.30325 17.4669L18.9772 6.79289C20.1488 5.62132 20.1488 3.72183 18.9772 2.55025L18.3056 1.87868ZM15.4772 3.29289C15.8677 2.90237 16.5009 2.90237 16.8914 3.29289L17.563 3.96447C17.9535 4.35499 17.9535 4.98816 17.563 5.37868L15.6414 7.30026L13.5556 5.21448L15.4772 3.29289ZM12.1414 6.62869L4.80325 13.9669C4.66877 14.1013 4.57543 14.2714 4.53417 14.457L4.0014 16.8545L6.39886 16.3217C6.58452 16.2805 6.75456 16.1871 6.88904 16.0526L14.2272 8.71448L12.1414 6.62869Z" fill="#0F0F0F"/></svg>
            '."</button>
            </form>";
    echo "<form class='confirmacion' method='POST' action='./php/eliminar_usuario.php'>
            <input type='hidden' name='usuario_id' value='" . htmlspecialchars($row['id']) . "'>
            <button class='registros__boton registros__boton--eliminar' type='submit'>".'
                <svg width="40px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M14 10V17M10 10V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            '."</button>
            </form>
    </td>";
}
        break;
    
    default:
if($vistas == "Ver_Deudas"){
    echo "<td class='registros__td registros__botones'>
            <form method='POST' action='index.php?vistas=Deudas_Detalladas'>
                <input type='hidden' name='persona_id' value='" . htmlspecialchars($row['id']) . "'>
                <button class='registros__boton registros__boton--ver' type='submit'>".
                '<svg width="40px" height="30px" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 1H1V3H3V1Z" fill="#000000"/><path d="M3 5H1V7H3V5Z" fill="#000000"/><path d="M1 9H3V11H1V9Z" fill="#000000"/><path d="M3 13H1V15H3V13Z" fill="#000000"/><path d="M15 1H5V3H15V1Z" fill="#000000"/><path d="M15 5H5V7H15V5Z" fill="#000000"/><path d="M5 9H15V11H5V9Z" fill="#000000"/><path d="M15 13H5V15H15V13Z" fill="#000000"/></svg>'
                ."</button>
            </form>
        </td>";
}

if($vistas == "Ver_Facturas"){
    echo "<td class='registros__td registros__botones'>
            <form method='POST' action='index.php?vistas=Facturas_Detalladas'>
                <input type='hidden' name='proveedor_id' value='" . htmlspecialchars($row['id']) . "'>
                <button class='registros__boton registros__boton--ver' type='submit'>".
                '<svg width="40px" height="30px" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 1H1V3H3V1Z" fill="#000000"/><path d="M3 5H1V7H3V5Z" fill="#000000"/><path d="M1 9H3V11H1V9Z" fill="#000000"/><path d="M3 13H1V15H3V13Z" fill="#000000"/><path d="M15 1H5V3H15V1Z" fill="#000000"/><path d="M15 5H5V7H15V5Z" fill="#000000"/><path d="M5 9H15V11H5V9Z" fill="#000000"/><path d="M15 13H5V15H15V13Z" fill="#000000"/></svg>'
                ."</button>
            </form></td>";

}

if($vistas == "Ver_Personas"){
    echo "<td class='registros__td registros__botones'>
        <button class='boton' id='boton' type='button'>No Hay Acciones</button>
    </td>";
}

if($vistas == "Ver_Proveedores"){
    echo "<td class='registros__td registros__botones'>
        <button class='boton' id='boton' type='button'>No Hay Acciones</button>
    </td>";
}

if($vistas == "Ver_Usuarios"){
    echo "<td class='registros__td registros__botones'>
    <form method='POST' action='index.php?vistas=Modificar_Usuario'>
            <input type='hidden' name='usuario_id' value='" . htmlspecialchars($row['id']) . "'>
            <button class='registros__boton registros__boton--modificar' type='submit'>".'
                <svg width="40px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                <path d="M1 22C1 21.4477 1.44772 21 2 21H22C22.5523 21 23 21.4477 23 22C23 22.5523 22.5523 23 22 23H2C1.44772 23 1 22.5523 1 22Z" fill="#0F0F0F"/>                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3056 1.87868C17.1341 0.707107 15.2346 0.707107 14.063 1.87868L3.38904 12.5526C2.9856 12.9561 2.70557 13.4662 2.5818 14.0232L2.04903 16.4206C1.73147 17.8496 3.00627 19.1244 4.43526 18.8069L6.83272 18.2741C7.38969 18.1503 7.89981 17.8703 8.30325 17.4669L18.9772 6.79289C20.1488 5.62132 20.1488 3.72183 18.9772 2.55025L18.3056 1.87868ZM15.4772 3.29289C15.8677 2.90237 16.5009 2.90237 16.8914 3.29289L17.563 3.96447C17.9535 4.35499 17.9535 4.98816 17.563 5.37868L15.6414 7.30026L13.5556 5.21448L15.4772 3.29289ZM12.1414 6.62869L4.80325 13.9669C4.66877 14.1013 4.57543 14.2714 4.53417 14.457L4.0014 16.8545L6.39886 16.3217C6.58452 16.2805 6.75456 16.1871 6.88904 16.0526L14.2272 8.71448L12.1414 6.62869Z" fill="#0F0F0F"/></svg>
            '."</button>
            </form>";
    echo "<form class='confirmacion' method='POST' action='./php/eliminar_usuario.php'>
            <input type='hidden' name='usuario_id' value='" . htmlspecialchars($row['id']) . "'>
            <button class='registros__boton registros__boton--eliminar' type='submit'>".'
                <svg width="40px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M14 10V17M10 10V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            '."</button>
            </form>
    </td>";
}

        break;
}
