<?php
include('functionslog.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Visitas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-3">Registro de Visitas</h2>
        <form method="post">
            <button type="submit" name="limpiar" class="btn btn-danger">Limpiar Registro</button>
        </form>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>IP</th>
                    <th>Script Accedido</th>
                    <th>Fecha y Hora</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($logs as $log): ?>
                    <tr>
                        <td><?= htmlspecialchars($log[0]) ?></td>
                        <td><?= htmlspecialchars($log[1]) ?></td>
                        <td><?= htmlspecialchars($log[2]) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br>
    <hr>
    <footer style="background-color: white; color: black; display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <h3>Estudiante: José Adrián López Medina - LM242664</h3>
        <h4>Técnico en Ingenieria en Computación - Escuela de Computacion Ciclo I - 2025</h4>
    </footer>
</body>

</html>