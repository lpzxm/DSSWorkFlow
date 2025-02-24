<?php
session_start();

//se valida que si no hay estudiantes registrados dentro de la session se redirecciona de regreso al index
if (!isset($_SESSION['estudiantes'])) {
    header('Location: index.php');
    exit;
}

//mediante el metodo post se le asigna un indice al estudiante para luego registrar las notas dentro de dicho estudiante
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $indice = $_POST['indice'];
    if (isset($_SESSION['estudiantes'][$indice])) {
        foreach ($_POST['calificaciones'] as $materia => $nota) {
            if (!isset($_SESSION['estudiantes'][$indice]['materias'][$materia])) {
                $_SESSION['estudiantes'][$indice]['materias'][$materia] = []; //dentro de este array asociativo se verifica si el indice no esta vacio
            }
            $_SESSION['estudiantes'][$indice]['materias'][$materia][] = (float)$nota; //se guarda dentro de esta variable la nota validando que sea float
        }
    }
    header('Location: calificaciones.php?indice=' . $indice); //se redirecciona a la misma pagina de calificaciones para seguir guardando mas notas
    exit;
}

if (!isset($_GET['indice']) || !isset($_SESSION['estudiantes'][$_GET['indice']])) {
    echo "<h3 class='text-danger text-center'>Error: Estudiante no encontrado.</h3>";
    echo "<p class='text-center'><a href='index.php' class='btn btn-primary'>Volver al Inicio</a></p>";
    exit;

    //se valida que el estudiante exista
}

$indice = $_GET['indice']; //se hace get del indice del estudiante para asignarle una nota
$estudiante = $_SESSION['estudiantes'][$indice];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Calificaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Asignar Calificaciones</h1>
        <h2 class="text-center mb-4">Estudiante: <?= $estudiante['nombre'] ?></h2>
        <form action="calificaciones.php" method="POST">
            <?php foreach ($estudiante['materias'] as $materia => $notas): ?>
                <div class="mb-3">
                    <label for="<?= $materia ?>" class="form-label"><?= $materia ?>:</label>
                    <input type="number" name="calificaciones[<?= $materia ?>]" id="<?= $materia ?>" class="form-control" step="0.01" placeholder="Ingresa una nota" required>
                    <p class="text-muted mt-2">Notas registradas:
                        <?= implode(', ', $notas ?: []) ?>
                    </p>
                </div>
            <?php endforeach; ?>
            <input type="hidden" name="indice" value="<?= $indice ?>">
            <button type="submit" class="btn btn-success">Guardar Calificaciones</button>
            <a href="resumen.php" class="btn btn-primary">Ir al resumen general</a>
        </form>
    </div>
</body>

</html>
