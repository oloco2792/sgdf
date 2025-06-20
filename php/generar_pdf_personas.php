<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

if (isset($_POST['html_content'])) {
    $html_recibido = $_POST['html_content'];

    // 1. Configurar opciones de Dompdf
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true); 
    $options->set('isRemoteEnabled', true);   

    $dompdf = new Dompdf($options);

    $html_para_pdf = '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Reporte de Personas y Deudas</title>
        <style>
            body {
                font-family: DejaVu Sans, sans-serif;
                font-size: 12px;
            }
            .registros__tabla {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            .registros__th, .registros__td {
                border: 1px solid #ccc;
                padding: 8px;
                text-align: left;

            }
            .registros__th {
                background-color: #f2f2f2;
                font-weight: bold;
                text-transform: uppercase;
            }
        </style>
    </head>
    <body>
        <h1>SUMINISTRO DE ALIMENTOS DON GREGO C.A</h1>
        <h2>J-409523802</h2>
        <h2>Registro de Clientes</h2>
        <h2>Fecha: '.date('d-m-Y').'</h2>
        ' . $html_recibido . '
    </body>
    </html>';


    $dompdf->loadHtml($html_para_pdf);

    $dompdf->setPaper('letter', 'portrait');

    $dompdf->render();

    $dompdf->stream("reporte_clientes(".date('d-m-Y').").pdf", ["Attachment" => true]);

} else {
    // Si no se recibió el contenido HTML, puedes redirigir o mostrar un mensaje de error
    echo "No se recibió el contenido de la tabla para generar el PDF.";
    // header('Location: ../index.php'); // Redirigir a la página principal
    exit;
}

?>