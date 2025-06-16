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
}
    if(vistas=="Nueva_Deuda" || 
        vistas=="Pagar_Deuda" ||
        vistas=="Modificar_Deuda" ||
        vistas=="Pagar_Deuda" ||
        vistas=="Nueva_Factura"||
        vistas=="Modificar_Factura"||
        vistas=="Nueva_Persona"||
        vistas=="Modificar_Persona"){
        window.location.href='index.php?vistas=Inicio';
    }
});