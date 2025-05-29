let registrosPorPagina = 10;
let registrosCompletos = [];
let paginaActual = 1;

// Función para cargar registros desde PHP
function cargarRegistros() {
    const fechaDesde = document.getElementById('fechaDesde').value;
    const fechaHasta = document.getElementById('fechaHasta').value;
    const busqueda = document.getElementById('busqueda').value;

    fetch('./php/obtener_registros.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: `fechaDesde=${fechaDesde}&fechaHasta=${fechaHasta}&busqueda=${busqueda}`
    })
    .then(res => res.json())
    .then(data => {
        registrosCompletos = data;
        paginaActual = 1;
        mostrarRegistros();
        crearPaginacion();
    });
}

// Función para mostrar registros en la página
function mostrarRegistros() {
    const tbody = document.querySelector('#registrosTabla tbody');
    tbody.innerHTML = '';

    const inicio = (paginaActual - 1) * registrosPorPagina;
    const fin = inicio + registrosPorPagina;
    const registrosPagina = registrosCompletos.slice(inicio, fin);

    registrosPagina.forEach(reg => {
        const fila = document.createElement('tr');
        fila.innerHTML = `
            <td>${reg.tipo}</td>
            <td>${reg.nombre}</td>
            <td>${reg.fecha}</td>
            <td>${reg.descripcion}</td>
            <td>${reg.monto}</td>
        `;
        tbody.appendChild(fila);
    });
}

// Crear botones de paginación
function crearPaginacion() {
    const pagDiv = document.getElementById('paginacion');
    pagDiv.innerHTML = '';

    const totalPaginas = Math.ceil(registrosCompletos.length / registrosPorPagina);

    for (let i=1; i<=totalPaginas; i++) {
        const btn = document.createElement('button');
        btn.textContent = i;
        if (i === paginaActual) btn.disabled = true;
        btn.onclick = () => {
            paginaActual = i;
            mostrarRegistros();
            crearPaginacion();
        };
        pagDiv.appendChild(btn);
    }
}

// Función para exportar en PDF
function exportarPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    let y = 10;
    doc.setFontSize(12);
    doc.text('Registros de Deudas y Facturas', 10, y);
    y += 10;

    // Obtener todos los registros filtrados
    const registros = registrosCompletos;

    registros.forEach((reg, index) => {
        if (y > 280) { // salto de página
            doc.addPage();
            y = 10;
        }
        const texto = `${index+1}. ${reg.tipo} - ${reg.nombre} - ${reg.fecha} - ${reg.descripcion} - ${reg.monto}`;
        doc.text(texto, 10, y);
        y += 10;
    });

    doc.save('registros.pdf');
}

// Carga inicial
window.onload = () => {
    cargarRegistros();
};
