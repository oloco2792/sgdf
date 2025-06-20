const boton = document.getElementById('boton');
const params = new URLSearchParams(window.location.search);
const vistas = params.get('vistas');

boton.addEventListener('click', function() {

if(vistas=="Ver_Deudas"){
        window.location.href='index.php?vistas=Nueva_Deuda';
}else if(vistas=="Ver_Facturas" || vistas=="Modificar_Facturas_Ver" || vistas=="Eliminar_Facturas_Ver" || vistas=="Facturas_Detalladas"){
        window.location.href='index.php?vistas=Nueva_Factura';
}else if(vistas=="Ver_Personas"){
        window.location.href='index.php?vistas=Nueva_Persona';
}else if(vistas=="Ver_Proveedores"){
        window.location.href='index.php?vistas=Nuevo_Proveedor';
}

    if(vistas=="Nueva_Deuda" || 
        vistas=="Pagar_Deuda" ||
        vistas=="Modificar_Deuda" ||
        vistas=="Pagar_Deuda" ||
        vistas=="Pagar_Factura" ||
        vistas=="Nueva_Factura"||
        vistas=="Modificar_Factura"||
        vistas=="Nueva_Persona"||
        vistas=="Modificar_Persona" ||
        vistas=="Modificar_Proveedor" ||
        vistas=="Registrar_Usuario" ||
        vistas=="Nuevo_Proveedor" ||
        vistas=="Modificar_Perfil"){
        window.location.href='index.php?vistas=Inicio';
    }
});