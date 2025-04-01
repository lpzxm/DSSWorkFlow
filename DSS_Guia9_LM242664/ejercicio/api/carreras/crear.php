<?php
require_once '../conexion.php';

$data = json_decode(file_get_contents("php://input"), true);

$nombre = $data['nombre'];
$descripcion = $data['descripcion'];
$duracion = $data['duracion'];

$query = "INSERT INTO carreras (nombre, descripcion, duracion) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->execute([$nombre, $descripcion, $duracion]);

echo json_encode(["mensaje" => "Carrera creada exitosamente"]);
