<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cálculo de días vividos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-lg">
          <div class="card-header bg-primary text-white text-center">
            <h4>Cálculo de días vividos</h4>
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="mb-3">
                <label for="name" class="form-label">Nombre Completo:</label>
                <input type="text" name="name" id="name" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="fechaNac" class="form-label">Fecha de nacimiento:</label>
                <input type="date" name="fechaNac" id="fechaNac" class="form-control" required>
              </div>
              <div class="text-center">
                <input type="submit" name="enviar" value="Calcular" class="btn btn-primary w-100">
              </div>
            </form>
          </div>
        </div>
        <div class="mt-3 text-center">
          <?php
          if (isset($_POST['enviar'])) {
            $nombre = !empty($_POST['name']) ? $_POST['name'] : "Dato Vacio";
            $fechaNac = !empty($_POST['fechaNac']) ? $_POST['fechaNac'] : "Error";

            if ($fechaNac !== "Error") {
              $fechaNacObj = new DateTime($fechaNac);
              $fechaActual = new DateTime();
              $diferencia = $fechaNacObj->diff($fechaActual);
              $diasVividos = $diferencia->days;

              echo '<div class="alert alert-success">Los días que has vivido, tú <strong>' . $nombre . '</strong> es la cantidad de: <strong>' . $diasVividos . '</strong></div>';
            } else {
              echo '<div class="alert alert-danger">Error: Fecha de nacimiento inválida.</div>';
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <?php
  include("../../footer.php");
  ?>
</body>

</html>