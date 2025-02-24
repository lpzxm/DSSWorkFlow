<?php
session_start();

//funcion para calcular el promedio mediante el metodo array_sum y la operacion matematica del total de esto entre el numero de materias registrados
function calcularPromedio($calificaciones)
{
    $total = array_sum($calificaciones);
    return count($calificaciones) > 0 ? $total / count($calificaciones) : 0;
}

if (!isset($_SESSION['estudiantes'])) {
    header('Location: index.php');
    exit;
}

$estudiantes = $_SESSION['estudiantes'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Resumen de Estudiantes</h1>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Carné</th>
                    <th>Carrera</th>
                    <th>Promedio General</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estudiantes as $estudiante): ?>
                    <?php
                    $promedioGeneral = 0;
                    $materiasConNotas = 0;

                    foreach ($estudiante['materias'] as $notas) {
                        if (!empty($notas)) {
                            $promedioGeneral += calcularPromedio($notas);
                            $materiasConNotas++;
                        }
                    }

                    $promedioGeneral = $materiasConNotas > 0 ? $promedioGeneral / $materiasConNotas : 0;
                    $estado = $promedioGeneral >= 6.0 ? 'Aprobado' : 'Reprobado';
                    ?>
                    <tr>
                        <td><?= $estudiante['nombre'] ?></td>
                        <td><?= $estudiante['carne'] ?></td>
                        <td><?= $estudiante['carrera'] ?></td>
                        <td><?= number_format($promedioGeneral, 2) ?></td>
                        <td class="<?= $estado === 'Aprobado' ? 'text-success' : 'text-danger' ?>">
                            <?= $estado ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>