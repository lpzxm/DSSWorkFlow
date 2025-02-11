<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Multiplicar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-success text-white text-center">
                        <h4>Tabla de Multiplicar</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="numero" class="form-label">Ingrese un número (1 - 10):</label>
                                <input type="number" name="numero" id="numero" class="form-control" min="1" max="10" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="enviar" class="btn btn-success w-100">Generar Tabla</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <?php
                    if (isset($_POST['enviar'])) {
                        $numBase = !empty($_POST['numero']) ? intval($_POST['numero']) : 0;
                    
                        echo '<div class="card shadow-lg">';
                        echo '<div class="card-body">';
                        echo "<h5 class='text-center'>Tabla del $numBase</h5>";
                        echo '<ul class="list-group">';
                    
                        for ($i = 1; $i <= 10; $i++) { 
                            echo "<li class='list-group-item text-start'>$numBase x $i = " . ($numBase * $i) . "</li>";
                        }
                    
                        echo '</ul>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php include("../../footer.php") ?>>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>