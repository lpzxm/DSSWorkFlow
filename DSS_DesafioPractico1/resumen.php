<?php
session_start();

// función para calcular el promedio de una materia mediante la funcion array_sum y luego realizar la operacion matematica
function calcularPromedio($calificaciones)
{
    if (count($calificaciones) > 0) {
        return count($calificaciones) > 0 ? array_sum($calificaciones) / count($calificaciones) : 0;
    } else {
        echo "No hay ninguna nota ingresada";
    }
}

if (!isset($_SESSION['estudiantes'])) {
    header('Location: index.php');
    exit;
}


//guardar en variable la informacion de los estudiantes para luego convertirlo en un array
$estudiantes = $_SESSION['estudiantes'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Notas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Resumen General de Notas de Estudiantes</h1>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Carné</th>
                    <th>Carrera</th>
                    <th>Materias y Notas</th>
                    <th>Promedio General</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estudiantes as $estudiante): ?>
                    <?php
                    $promedioGeneral = 0;
                    $materiasConNotas = 0;
                    ?>
                    <tr>
                        <td><?= $estudiante['nombre'] ?></td>
                        <td><?= $estudiante['carne'] ?></td>
                        <td><?= $estudiante['carrera'] ?></td>
                        <td>
                            <ul>
                                <?php foreach ($estudiante['materias'] as $materia => $notas): ?>
                                    <?php
                                    $promedioMateria = calcularPromedio($notas);
                                    $promedioGeneral += $promedioMateria;
                                    $materiasConNotas++;
                                    ?>
                                    <li>
                                        <strong><?= $materia ?>:</strong> <?= implode(", ", $notas) ?>
                                        <br><small>Promedio: <?= number_format($promedioMateria, 2) ?></small>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </td>
                        <?php
                        $promedioGeneral = $materiasConNotas > 0 ? $promedioGeneral / $materiasConNotas : 0;
                        $estado = $promedioGeneral >= 6.0 ? 'Aprobado' : 'Reprobado';
                        ?>
                        <td><?= number_format($promedioGeneral, 2) ?></td>
                        <td class="<?= $estado === 'Aprobado' ? 'text-success' : 'text-danger' ?>">
                            <?= $estado ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="./index.php" class="btn btn-success">Ir al inicio</a>
    </div>
</body>

</html>