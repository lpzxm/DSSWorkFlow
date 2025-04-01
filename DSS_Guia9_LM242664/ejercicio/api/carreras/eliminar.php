<?php
require_once '../conexion.php';

$data = json_decode(file_get_contents("php://input"), true);

$carrera_id = $data['carrera_id'];

// Verificar si hay estudiantes asociados
$query = "SELECT COUNT(*) as total FROM estudiantes WHERE id_carrera = ? AND estado = 1";
$stmt = $conn->prepare($query);
$stmt->execute([$carrera_id]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result['total'] > 0) {
    echo json_encode(["error" => "No se puede eliminar la carrera porque tiene estudiantes asociados"]);
    exit;
}

// Eliminación lógica (cambiar estado)
$query = "UPDATE carreras SET estado = 0 WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$carrera_id]);

echo json_encode(["mensaje" => "Carrera eliminada exitosamente"]);
