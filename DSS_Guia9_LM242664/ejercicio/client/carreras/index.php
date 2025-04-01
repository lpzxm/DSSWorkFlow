<?php
$url = "http://localhost/proyecto/api/carreras/listar.php";
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
$carreras = json_decode($response, true);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mantenimiento de Carreras</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Carreras</h1>
        <a href="nuevo.php" class="btn btn-primary mb-3">Nueva Carrera</a>
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Duración</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($carreras as $carrera): ?>
                <tr>
                    <td><?= $carrera['carrera_id'] ?></td>
                    <td><?= $carrera['nombre'] ?></td>
                    <td><?= $carrera['descripcion'] ?></td>
                    <td><?= $carrera['duracion'] ?> años</td>
                    <td>
                        <a href="editar.php?id=<?= $carrera['carrera_id'] ?>" class="btn btn-warning">Editar</a>
                        <a href="eliminar.php?id=<?= $carrera['carrera_id'] ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>