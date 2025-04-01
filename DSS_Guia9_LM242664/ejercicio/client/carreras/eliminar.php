<?php
$carrera_id = $_GET['id'];

$data = ['carrera_id' => $carrera_id];

$url = "http://localhost/proyecto/api/carreras/eliminar.php";
$options = [
    'http' => [
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data)
    ]
];

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

// Manejar posibles errores
$response = json_decode($result, true);
if (isset($response['error'])) {
    session_start();
    $_SESSION['error'] = $response['error'];
}

header("Location: index.php");
exit;
