<?php
// Obtener datos de la carrera a editar
$carrera_id = $_GET['id'];
$url = "http://localhost/DSS_Guia9_LM242664/ejercicio/api/carreras/listar.php";
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
$carreras = json_decode($response, true);

// Buscar la carrera específica
$carrera_actual = null;
foreach ($carreras as $carrera) {
    if ($carrera['id'] == $carrera_id) {
        $carrera_actual = $carrera;
        break;
    }
}

if (!$carrera_actual) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Editar Carrera</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Editar Carrera</h1>

        <form action="procesar_editar.php" method="POST">
            <input type="hidden" name="carrera_id" value="<?= $carrera_actual['id'] ?>">

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?= $carrera_actual['nombre'] ?>" required>
            </div>

            <div class="form-group">
                <label>Descripción</label>
                <textarea name="descripcion" class="form-control"><?= $carrera_actual['descripcion'] ?></textarea>
            </div>

            <div class="form-group">
                <label>Duración (años)</label>
                <input type="number" name="duracion" class="form-control" value="<?= $carrera_actual['duracion'] ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>

</html>