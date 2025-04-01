<?php
require_once '../conexion.php';

$query = "SELECT e.*, c.nombre as carrera_nombre 
          FROM estudiantes e 
          LEFT JOIN carreras c ON e.id_carrera = c.id 
          WHERE e.estado = 1";
$stmt = $conn->prepare($query);
$stmt->execute();

$estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($estudiantes);
