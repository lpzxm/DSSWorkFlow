<?php
// Obtener datos del estudiante
$estudiante_id = $_GET['id'];
$url_estudiante = "http://localhost/DSS_Guia9_LM242664/ejercicio/api/estudiantes/listar.php";
$client = curl_init($url_estudiante);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
$estudiantes = json_decode($response, true);

// Buscar el estudiante específico
$estudiante_actual = null;
foreach ($estudiantes as $estudiante) {
    if ($estudiante['id'] == $estudiante_id) {
        $estudiante_actual = $estudiante;
        break;
    }
}

if (!$estudiante_actual) {
    header("Location: index.php");
    exit;
}

// Obtener carreras para el select
$url_carreras = "http://localhost/DSS_Guia9_LM242664/ejercicio/api/carreras/listar.php";
$client = curl_init($url_carreras);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
$carreras = json_decode($response, true);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Estudiante</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Editar Estudiante</h1>
        
        <form action="procesar_editar.php" method="POST">
            <input type="hidden" name="estudiante_id" value="<?= $estudiante_actual['id'] ?>">
            
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?= $estudiante_actual['nombre'] ?>" required>
            </div>
            
            <div class="form-group">
                <label>Apellido</label>
                <input type="text" name="apellido" class="form-control" value="<?= $estudiante_actual['apellido'] ?>" required>
            </div>
            
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= $estudiante_actual['email'] ?>" required>
            </div>
            
            <div class="form-group">
                <label>Carrera</label>
                <select name="carrera_id" class="form-control">
                    <option value="">Seleccione una carrera</option>
                    <?php foreach($carreras as $carrera): ?>
                    <option value="<?= $carrera['id'] ?>" <?= ($carrera['id'] == $estudiante_actual['id_carrera']) ? 'selected' : '' ?>>
                        <?= $carrera['nombre'] ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label>Fecha de Ingreso</label>
                <input type="date" name="fecha_ingreso" class="form-control" value="<?= $estudiante_actual['fecha_ingreso'] ?>" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>