<?php
require_once '../conexion.php';

$data = json_decode(file_get_contents("php://input"), true);

$estudiante_id = $data['estudiante_id'];
$nombre = $data['nombre'];
$apellido = $data['apellido'];
$email = $data['email'];
$carrera_id = $data['carrera_id'];
$fecha_ingreso = $data['fecha_ingreso'];

$query = "UPDATE estudiantes SET nombre = ?, apellido = ?, email = ?, id_carrera = ?, fecha_ingreso = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$nombre, $apellido, $email, $carrera_id, $fecha_ingreso, $estudiante_id]);

echo json_encode(["mensaje" => "Estudiante actualizado exitosamente"]);
