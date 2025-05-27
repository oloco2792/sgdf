//Deshabilitar Inputs y "Deshabilitar" Texto
function enableCampos(checkbox) {
    const inputs = document.querySelectorAll('.activarInput');
    inputs.forEach(function(input) {
        if(checkbox.checked){
            input.disabled = false; 
        }else{
            input.disabled = true; 
        }
        
    });

    const labels = document.querySelectorAll('.datosNombres');
    labels.forEach(label => {
        if (checkbox.checked) {
            label.classList.remove('label--off');
        } else {
            label.classList.add('label--off');
        }
    });

    const inputs = document.querySelectorAll('.datos');
    inputs.forEach(function(input) {
        if(checkbox.checked){
            select.disabled = true;    
        }else{
            select.disabled = false;
        }
        
    });
}
