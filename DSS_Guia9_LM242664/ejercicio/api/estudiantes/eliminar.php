<?php
require_once '../conexion.php';

$data = json_decode(file_get_contents("php://input"), true);

$estudiante_id = $data['estudiante_id'];

// Eliminación lógica (cambiar estado)
$query = "UPDATE estudiantes SET estado = 0 WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$estudiante_id]);

echo json_encode(["mensaje" => "Estudiante eliminado exitosamente"]);
