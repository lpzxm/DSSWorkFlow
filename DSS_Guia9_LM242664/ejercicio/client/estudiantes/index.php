<?php
// Consumir el webservice de estudiantes
$url_estudiantes = "http://localhost/DSS_Guia9_LM242664/ejercicio/api/estudiantes/listar.php";
$client = curl_init($url_estudiantes);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
$estudiantes = json_decode($response, true);

// Verificar si hubo error en la respuesta
if (json_last_error() !== JSON_ERROR_NONE || !is_array($estudiantes)) {
    die('Error al obtener los datos de estudiantes');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Listado de Estudiantes</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }

        .badge {
            font-size: 0.9em;
            padding: 0.6em 1em;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Gestión de Estudiantes</h3>
                <a href="nuevo.php" class="btn btn-light">
                    <i class="bi bi-plus-circle"></i> Nuevo Estudiante
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Nombre Completo</th>
                                <th>Email</th>
                                <th>Carrera</th>
                                <th>Fecha Ingreso</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($estudiantes) > 0): ?>
                                <?php foreach ($estudiantes as $index => $estudiante): ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= htmlspecialchars($estudiante['nombre'] . ' ' . $estudiante['apellido']) ?></td>
                                        <td><?= htmlspecialchars($estudiante['email']) ?></td>
                                        <td>
                                            <span class="badge bg-info">
                                                <?= htmlspecialchars($estudiante['carrera_nombre'] ?? 'Sin carrera') ?>
                                            </span>
                                        </td>
                                        <td><?= date('d/m/Y', strtotime($estudiante['fecha_ingreso'])) ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="editar.php?id=<?= $estudiante['id'] ?>"
                                                    class="btn btn-sm btn-warning"
                                                    title="Editar"
                                                    data-bs-toggle="tooltip">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="eliminar.php?id=<?= $estudiante['id'] ?>"
                                                    class="btn btn-sm btn-danger"
                                                    title="Eliminar"
                                                    data-bs-toggle="tooltip"
                                                    onclick="return confirm('¿Estás seguro de eliminar este estudiante?')">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        No hay estudiantes registrados
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- Scripts adicionales -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
        // Activar tooltips de Bootstrap
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        })
    </script>
</body>

</html>