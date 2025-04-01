<?php
require_once '../conexion.php';

$data = json_decode(file_get_contents("php://input"), true);

$carrera_id = $data['carrera_id'];
$nombre = $data['nombre'];
$descripcion = $data['descripcion'];
$duracion = $data['duracion'];

$query = "UPDATE carreras SET nombre = ?, descripcion = ?, duracion = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$nombre, $descripcion, $duracion, $carrera_id]);

echo json_encode(["mensaje" => "Carrera actualizada exitosamente"]);
?>