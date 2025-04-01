<?php
$estudiante_id = $_GET['id'];

$data = ['estudiante_id' => $estudiante_id];

$url = "http://localhost/proyecto/api/estudiantes/eliminar.php";
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
