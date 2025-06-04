import { jsPDF } from "jspdf";
import autoTable from "jspdf-autotable";
document.getElementById('btnGenerarPDF').addEventListener('click', () => {
const { jsPDF } = window.jspdf;
const doc = new jsPDF();

const table = document.querySelector('.registros__tabla');

// Obtener cabecera
const headers = [];
table.querySelectorAll('thead th').forEach(th => {
    headers.push(th.innerText);
});

// Obtener filas
const data = [];
table.querySelectorAll('tbody tr').forEach(tr => {
    const rowData = [];
    tr.querySelectorAll('td').forEach(td => {
    rowData.push(td.innerText);
    });
    data.push(rowData);
});

// Crear la tabla en el PDF
jsPDF.autoTable(doc, {
    head: [headers],
    body: data,
});

// Guardar PDF
doc.save('personas_deudas.pdf');
console.log("hola")
});