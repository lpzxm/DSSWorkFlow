<?php
$serverName = $_SERVER['SERVER_NAME'];
$rutaArchivo = $_SERVER['SCRIPT_NAME'];
$rutaCompleta = $serverName . "" . $rutaArchivo;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruta Completa mediante variables globales</title>
</head>
<body>
    <h1>Impresión de ruta completa mediante variables globales</h1>
    <p>Incluyendo nombre del servidor junto a la ruta completa del script.</p>
    <p>Ruta: <?= $rutaCompleta ?></p>
    <?php
    include("../footer.php");
    ?>
</body>
</html>