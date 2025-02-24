<?php
session_start();
require_once './data/materias.php';


//si la variable de estudiantes no esta iniciada, se crea en este instante
if (!isset($_SESSION['estudiantes'])) {
    $_SESSION['estudiantes'] = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Registro de Estudiantes</h1>
        <form action="registro.php" method="POST" class="mb-5">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="carne" class="form-label">Carnet:</label>
                <input type="text" name="carne" id="carne" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="carrera" class="form-label">Carrera:</label>
                <input type="text" name="carrera" id="carrera" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="materias" class="form-label">Materias:</label>
                <select name="materias[]" id="materias" class="form-select" multiple required>
                    <?php foreach ($materias as $materia): ?>
                        <option value="<?= $materia ?>"><?= $materia ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Registrar</button>
        </form>

        <h2>Estudiantes Inscritos</h2>
        <?php if (!empty($_SESSION['estudiantes'])): ?>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Carné</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['estudiantes'] as $indice => $estudiante): ?>
                        <tr>
                            <td><?= $estudiante['nombre'] ?></td>
                            <td><?= $estudiante['carne'] ?></td>
                            <td>
                                <a href="calificaciones.php?indice=<?= $indice ?>" class="btn btn-success btn-sm">Asignar Calificaciones</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-muted">No hay estudiantes inscritos aún.</p>
        <?php endif; ?>
    </div>
</body>

</html>