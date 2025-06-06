<?php
require_once "main.php";

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root1234');
define('DB_NAME', 'sgdf');

$backup_dir = '../backups/';
if (!is_dir($backup_dir)) {
    mkdir($backup_dir, 0777, true);
}

$filename = 'backup_sgdf'.'_'.date('Y-m-d_H-i-s').'.sql';
$filepath = $backup_dir . $filename;

// --- Ruta a mysqldump ---
// ¡Importante! Necesitas la ruta completa a mysqldump.
// En Linux/macOS, suele ser /usr/bin/mysqldump o /usr/local/bin/mysqldump
// En Windows, es la ruta dentro de tu instalación de MySQL (ej: C:\xampp\mysql\bin\mysqldump.exe)
$mysqldump_path = 'C:\wamp64\bin\mysql\mysql8.3.0\bin\mysqldump.exe'; // O la ruta correcta para tu servidor

// Verifica si mysqldump existe
if (!file_exists($mysqldump_path)) {
    die("Error: mysqldump no encontrado en la ruta especificada: " . htmlspecialchars($mysqldump_path) . ". Por favor, verifica la ruta.");
}

// --- Comando para ejecutar mysqldump ---
$command = "$mysqldump_path -u " . escapeshellarg("root") .
           " -p" . escapeshellarg("root1234") .
           " -h " . escapeshellarg("localhost") .
           " " . escapeshellarg("sgdf") .
           " > " . escapeshellarg($filepath);

$output = [];
$return_var = 0;
exec($command, $output, $return_var); 

if ($return_var === 0) {
    // Si la ejecución fue exitosa, ahora puedes ofrecer el archivo para descarga o mostrar un mensaje
    header('Content-Type: application/sql');
    header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
    header('Content-Length: ' . filesize($filepath));
    readfile($filepath);
    unlink($filepath); // Opcional: eliminar el archivo del servidor después de la descarga
    exit;
} else {
    echo "<h1>Error al generar el respaldo de la base de datos.</h1>";
    echo "<p>Comando ejecutado: <pre>" . htmlspecialchars($command) . "</pre></p>";
    echo "<p>Código de retorno: " . htmlspecialchars($return_var) . "</p>";
    echo "<p>Salida del comando:</p><pre>";
    echo htmlspecialchars(implode("\n", $output));
    echo "</pre>";
    echo "<p>Verifica los permisos del directorio de respaldo, la ruta a mysqldump y las credenciales de la base de datos.</p>";
}
?>