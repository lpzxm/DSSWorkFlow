<?php
session_start();

// Archivo donde se almacenarán los logs
$log_file = "visitas.log";

// Obtener datos del visitante
$ip = $_SERVER['REMOTE_ADDR'];
$script = $_SERVER['SCRIPT_NAME'];
$fecha = date("Y-m-d H:i:s");

// Registrar en el archivo de log
$log_entry = "$ip | $script | $fecha\n";
file_put_contents($log_file, $log_entry, FILE_APPEND);

// Leer registros del archivo de log
$logs = [];
if (file_exists($log_file)) {
    $lines = file($log_file, FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        $logs[] = explode(" | ", $line);
    }
}

// Limpiar el log si se presiona el botón
if (isset($_POST['limpiar'])) {
    file_put_contents($log_file, "");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>