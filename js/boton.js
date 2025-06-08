const boton = document.getElementById('boton');
const params = new URLSearchParams(window.location.search);
const vistas = params.get('vistas');

boton.addEventListener('click', function() {

    switch(vistas){
        case "Ver_Deudas":
            window.location.href='index.php?vistas=Nueva_Deuda';
        break;
        case "Modificar_Deudas_Registros":
            window.location.href='index.php?vistas=Nueva_Deuda';
        break;
        case "Eliminar_Deudas_Registros":
            window.location.href='index.php?vistas=Nueva_Deuda';
        break;
    }

    if(vistas==="Nueva_Deuda" || 
        vistas=="Pagar_Deuda"){
        window.location.href='index.php?vistas=Inicio';
    }
});