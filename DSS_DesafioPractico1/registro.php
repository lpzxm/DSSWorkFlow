<?php
session_start();


//se guarda en variables los datos de sesion al registrar un nuevo estudiante
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $carne = $_POST['carne'];
    $carrera = $_POST['carrera'];
    $materias = $_POST['materias'];

    $nuevoEstudiante = [
        'nombre' => $nombre,
        'carne' => $carne,
        'carrera' => $carrera,
        'materias' => array_fill_keys($materias, null), // Se inicializa el array como null para validar
    ];

    $_SESSION['estudiantes'][] = $nuevoEstudiante;
}

header('Location: index.php');
exit;
