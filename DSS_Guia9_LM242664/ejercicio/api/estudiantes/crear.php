<?php
require_once '../conexion.php';

$data = json_decode(file_get_contents("php://input"), true);

$nombre = $data['nombre'];
$apellido = $data['apellido'];
$email = $data['email'];
$carrera_id = $data['carrera_id'];
$fecha_ingreso = $data['fecha_ingreso'];

$query = "INSERT INTO estudiantes (nombre, apellido, email, id_carrera, fecha_ingreso) 
           VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->execute([$nombre, $apellido, $email, $carrera_id, $fecha_ingreso]);

echo json_encode(["mensaje" => "Estudiante creado exitosamente"]);
