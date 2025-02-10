<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Potenciacion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Calculadora de Potencia</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="base" class="form-label">Ingrese un número:</label>
                                <input type="number" name="base" id="base" class="form-control" step="any" required>
                            </div>
                            <div class="mb-3">
                                <label for="exponente" class="form-label">Ingrese un exponente (entero):</label>
                                <input type="number" name="exponente" id="exponente" class="form-control" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="enviar" class="btn btn-primary w-100">Calcular</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <?php if (isset($_POST['enviar'])):
                        $numBase = !empty($_POST['base']) ? floatval($_POST['base']) : "";
                        $numExpo = !empty($_POST['exponente']) ? intval($_POST['exponente']) : "";
                        $resultado = 1;

                        if ($numExpo > 0) {
                            for ($i = 0; $i < $numExpo; $i++) {
                                $resultado *= $numBase;
                            }
                        } elseif ($numExpo < 0) {
                            for ($i = 0; $i < abs($numExpo); $i++) {
                                $resultado *= $numBase;
                            }
                            $resultado = 1 / $resultado;
                        } else {
                            $resultado = 1;
                        }
                    ?>
                        <div class="alert alert-info">
                            Resultado: <strong><?php echo $resultado ?></strong>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>