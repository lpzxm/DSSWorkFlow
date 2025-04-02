<?php
//consumiendo nuestro webservice para obtener el conjunto de datos
$user_id = $_GET['user_id'];
$url = "http://localhost/DSS_Guia9_LM242664/api/obtener/" . $user_id;
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
$result = json_decode($response);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Eliminar un usuario con API Rest</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-offset-2 col-md-8">
                        <h1>Eliminar un usuario</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-offset-2 col-md-8">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <a href="index.php" class="btn btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <form action="eliminar.php" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $result->user_id; ?>" />
                    <div class="form-group">
                        <label for="nombre_usuario">Nombre Usuario</label>
                        <input readonly type="text" value="<?php echo $result->username; ?>" class="form-control"
                            name="username" id="nombre_usuario" />
                    </div>
                    <div class="form-group">
                        <label for="correo_usuario">Correo Usuario</label>
                        <input readonly type="text" value="<?php echo $result->user_email; ?>" class="form-control"
                            name="user_email" id="correo_usuario" />
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input readonly type="text" value="<?php echo $result->user_email; ?>" class="form-control"
                            name="estado" id="estado" />
                    </div>
                    <button type="submit" class="btn btn-danger">Confirmar</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    include("./footer.php")
    ?>

    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php
if (!empty($_POST)) {
    //consumiendo nuestro webservice para enviar el conjunto de datos
    $user_id = $_POST['user_id'];
    $url = "http://localhost/DSSWorkFlow/DSS_Guia9_LM242664/api/eliminar/" . $user_id;
    $client = curl_init($url);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    if ($response == "Exito") {
        echo "<script>alert('registro eliminado exitosamente');document.location='index.php'</script>";
    } else {
        echo "<script>alert('No se pudo eliminado el registro');document.location='index.php'</script>";
    }
}
?>