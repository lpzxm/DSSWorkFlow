<?php
$data = [
    'carrera_id' => $_POST['carrera_id'],
    'nombre' => $_POST['nombre'],
    'descripcion' => $_POST['descripcion'],
    'duracion' => $_POST['duracion']
];

$url = "http://localhost/proyecto/api/carreras/actualizar.php";
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
