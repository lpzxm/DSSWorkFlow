<?php
session_start();
if (!isset($_SESSION['nombre_completo'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Zona Restringida</title>
</head>

<body>
    <h2>Bienvenido, <?php echo $_SESSION['nombre_completo']; ?></h2>
    <p>Este es contenido exclusivo para usuarios autenticados.</p>
    <a href="logout.php">Cerrar sesión</a>
</body>

</html>