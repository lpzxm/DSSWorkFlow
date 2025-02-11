<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promedio de Notas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Registro de Notas</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div id="estudiantes">
                                <div class="estudiante mb-3 border p-3 rounded">
                                    <h5>Estudiante 1</h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Nombre:</label>
                                            <input type="text" name="nombre[]" class="form-control" required>
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <label class="form-label">Tarea (50%):</label>
                                            <input type="number" name="tarea[]" class="form-control" min="0" max="10" step="0.1" required>
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <label class="form-label">Investigación (30%):</label>
                                            <input type="number" name="investigacion[]" class="form-control" min="0" max="10" step="0.1" required>
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <label class="form-label">Examen (20%):</label>
                                            <input type="number" name="examen[]" class="form-control" min="0" max="10" step="0.1" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-success mb-3" onclick="agregarEstudiante()">Agregar Estudiante</button>
                            <div class="text-center">
                                <button type="submit" name="calcular" class="btn btn-primary w-100">Calcular Promedios</button>
                            </div>
                        </form>
                    </div>
                </div>

                <?php if (isset($_POST['calcular'])): ?>
                    <div class="mt-4">
                        <h5 class="text-center">Resultados</h5>
                        <table class="table table-bordered text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Tarea (50%)</th>
                                    <th>Investigación (30%)</th>
                                    <th>Examen (20%)</th>
                                    <th>Promedio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nombres = $_POST['nombre'];
                                $tareas = $_POST['tarea'];
                                $investigaciones = $_POST['investigacion'];
                                $examenes = $_POST['examen'];

                                $notas = array();

                                for ($i = 0; $i < count($nombres); $i++) {
                                    $nombre = $nombres[$i];
                                    $tarea = floatval($tareas[$i]);
                                    $investigacion = floatval($investigaciones[$i]);
                                    $examen = floatval($examenes[$i]);

                                    $promedio = ($tarea * 0.50) + ($investigacion * 0.30) + ($examen * 0.20);

                                    $notas[$nombre] = array(
                                        "Tarea" => $tarea,
                                        "Investigación" => $investigacion,
                                        "Examen" => $examen,
                                        "Promedio" => round($promedio, 2)
                                    );
                                }

                                foreach ($notas as $nombre => $detalles) {
                                    echo "<tr>
                                    <td>{$nombre}</td>
                                    <td>{$detalles['Tarea']}</td>
                                    <td>{$detalles['Investigación']}</td>
                                    <td>{$detalles['Examen']}</td>
                                    <td class='fw-bold'>{$detalles['Promedio']}</td>
                                </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php include("../../footer.php"); ?>

    <script>
        let contador = 1;

        function agregarEstudiante() {
            contador++;
            let nuevoEstudiante = `
                <div class="estudiante mb-3 border p-3 rounded">
                    <h5>Estudiante ${contador}</h5>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Nombre:</label>
                            <input type="text" name="nombre[]" class="form-control" required>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label class="form-label">Tarea (50%):</label>
                            <input type="number" name="tarea[]" class="form-control" min="0" max="10" step="0.1" required>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label class="form-label">Investigación (30%):</label>
                            <input type="number" name="investigacion[]" class="form-control" min="0" max="10" step="0.1" required>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label class="form-label">Examen (20%):</label>
                            <input type="number" name="examen[]" class="form-control" min="0" max="10" step="0.1" required>
                        </div>
                    </div>
                </div>`;
            document.getElementById("estudiantes").insertAdjacentHTML("beforeend", nuevoEstudiante);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>