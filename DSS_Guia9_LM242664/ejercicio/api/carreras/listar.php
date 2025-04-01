<?php
require_once '../conexion.php';

$query = "SELECT * FROM carreras WHERE estado = 1";
$stmt = $conn->prepare($query);
$stmt->execute();

$carreras = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($carreras);
