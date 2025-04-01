<?php
// Obtener carreras para el select
$url = "http://localhost/proyecto/api/carreras/listar.php";
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
$carreras = json_decode($response, true);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Estudiante</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Nuevo Estudiante</h1>
        
        <form action="procesar.php" method="POST">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label>Apellido</label>
                <input type="text" name="apellido" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label>Carrera</label>
                <select name="carrera_id" class="form-control">
                    <option value="">Seleccione una carrera</option>
                    <?php foreach($carreras as $carrera): ?>
                    <option value="<?= $carrera['carrera_id'] ?>"><?= $carrera['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label>Fecha de Ingreso</label>
                <input type="date" name="fecha_ingreso" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>