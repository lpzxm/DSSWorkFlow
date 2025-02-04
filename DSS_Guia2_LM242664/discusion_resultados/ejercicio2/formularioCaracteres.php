<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validación de caracteres ingresados</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-lg">
          <div class="card-header bg-primary text-white text-center">
            <h4>Determinación de caracteres</h4>
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="mb-3">
                <label for="char" class="form-label">Ingrese un carácter:</label>
                <input type="text" name="char" id="char" class="form-control" maxlength="1" required>
              </div>
              <div class="text-center">
                <input type="submit" name="verificar" value="Verificar" class="btn btn-primary w-100">
              </div>
            </form>
          </div>
        </div>
        <div class="mt-3 text-center">
          <?php
          if (isset($_POST['verificar'])) {
              $char = $_POST['char'];
              if (preg_match('/^[aeiouáéíóúAEIOUÁÉÍÓÚ]$/', $char)) {
                  echo '<div class="alert alert-success">El carácter ingresado es una <strong>vocal</strong>.</div>';
              } elseif (preg_match('/^[bcdfghjklmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ]$/', $char)) {
                  echo '<div class="alert alert-success">El carácter ingresado es una <strong>consonante</strong>.</div>';
              } elseif (preg_match('/^[0-9]$/', $char)) {
                  echo '<div class="alert alert-success">El carácter ingresado es un <strong>número</strong>.</div>';
              } elseif (preg_match('/^[.,;:()"!¡¿?#$%&]$/', $char)) {
                  echo '<div class="alert alert-success">El carácter ingresado es un <strong>símbolo</strong>.</div>';
              } else {
                  echo '<div class="alert alert-danger">El carácter ingresado no se puede procesar.</div>';
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
