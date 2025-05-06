<?php
session_start();
include("db.php");

$usuario = $_POST['usuario'];
$contrasena = sha1($_POST['contrasena']);

$sql = "SELECT nombre_completo FROM usuarios WHERE usuario=? AND contrasena=?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ss", $usuario, $contrasena);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($nombre);
    $stmt->fetch();
    $_SESSION['nombre_completo'] = $nombre;
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Credenciales incorrectas']);
}
