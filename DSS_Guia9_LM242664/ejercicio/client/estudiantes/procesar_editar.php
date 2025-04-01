<?php
$data = [
    'estudiante_id' => $_POST['estudiante_id'],
    'nombre' => $_POST['nombre'],
    'apellido' => $_POST['apellido'],
    'email' => $_POST['email'],
    'carrera_id' => $_POST['carrera_id'],
    'fecha_ingreso' => $_POST['fecha_ingreso']
];

$url = "http://localhost/proyecto/api/estudiantes/actualizar.php";
$options = [
    'http' => [
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data)
    ]
];

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

header("Location: index.php");
exit;
