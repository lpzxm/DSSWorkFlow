<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Dólares a Euros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Conversor de Dólares a Euros</h2>
        <div class="card shadow p-4">
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Ingrese la cantidad en dólares ($):</label>
                    <input type="text" class="form-control" oninput="onlyNumbersDot(this)" name="cantidad" id="cantidad" required autofocus>
                </div>
                <button type="submit" class="btn btn-primary w-100">Convertir</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['cantidad']) && is_numeric($_POST['cantidad'])) {
                $dolares = floatval($_POST['cantidad']);
                $tasaCambio = 0.92; // Tasa de conversión ficticia (1 USD = 0.92 EUR)
                $euros = $dolares * $tasaCambio;
        ?>
                <div class="mt-4">
                    <h3 class="text-center">Resultado de la Conversión</h3>
                    <table class="table table-bordered table-striped text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Dólares ($)</th>
                                <th>Euros (€)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo number_format($dolares, 2); ?></td>
                                <td><?php echo number_format($euros, 2); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        <?php
            } else {
                echo '<div class="alert alert-danger mt-3">Por favor, ingrese un valor numérico válido.</div>';
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function onlyNumbersDot(input) {
            const regex = /^\d+(\.\d{0,2})?$/;
            if (!regex.test(input.value)) {
                input.value = input.value.slice(0, -1);
            }
        }
    </script>
</body>
</html>