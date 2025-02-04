<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de CUM y UV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Cálculo de CUM y UV</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Ingresa tu nombre:</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label for="mat<?= $i ?>" class="form-label">Materia <?= $i ?>:</label>
                                        <input type="text" name="mat<?= $i ?>" id="mat<?= $i ?>" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nmat<?= $i ?>" class="form-label">Nota Materia <?= $i ?>:</label>
                                        <input type="number" name="nmat<?= $i ?>" id="nmat<?= $i ?>" class="form-control" step="0.01" min="0" max="10" required>
                                    </div>
                                </div>
                            <?php endfor; ?>

                            <div class="text-center">
                                <input type="submit" name="verificar" value="Calcular" class="btn btn-primary w-100">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <?php
                    if (isset($_POST['verificar'])) {
                        $name = !empty($_POST['name']) ? $_POST['name'] : "Vacío";
                        $totalNotas = 0;
                        $numMaterias = 5;

                        echo '<div class="alert alert-info">Resultados para <strong>' . $name . '</strong>:</div>';

                        for ($i = 1; $i <= $numMaterias; $i++) {
                            $materia = !empty($_POST['mat' . $i]) ? $_POST['mat' . $i] : "Vacío";
                            $nota = !empty($_POST['nmat' . $i]) ? (float)$_POST['nmat' . $i] : 0;
                            $totalNotas += $nota;
                            echo '<div class="alert alert-secondary">' . $materia . ': <strong>' . number_format($nota, 2) . '</strong></div>';
                        }

                        $CUM = $totalNotas / $numMaterias;

                        if ($CUM >= 7.5) {
                            $uvMax = 32;
                        } elseif ($CUM >= 7.0) {
                            $uvMax = 24;
                        } elseif ($CUM >= 6.0) {
                            $uvMax = 20;
                        } else {
                            $uvMax = 16;
                        }

                        echo '<div class="alert alert-success">Tu CUM es: <strong>' . number_format($CUM, 2) . '</strong></div>';
                        echo '<div class="alert alert-primary">Puedes cursar hasta <strong>' . $uvMax . ' UV</strong> en el próximo ciclo.</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php include("../footer.php"); ?>
</body>

</html>