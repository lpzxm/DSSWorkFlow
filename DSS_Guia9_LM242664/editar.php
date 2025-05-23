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
    <title>Editar un usuario con API Rest</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-offset-2 col-md-8">
                        <h1>Editar un usuario</h1>
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
                <form action="editar.php" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $result->user_id; ?>" />
                    <div class="form-group">
                        <label for="nombre_usuario">Nombre Usuario</label>
                        <input type="text" value="<?php echo $result->username; ?>" class="form-control"
                            placeholder="Nombre Usuario" name="username" id="nombre_usuario" />
                    </div>
                    <div class="form-group">
                        <label for="correo_usuario">Correo Usuario</label>
                        <input type="text" value="<?php echo $result->user_email; ?>" class="form-control"
                            placeholder="Correo Usuario" name="user_email" id="correo_usuario" />
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" id="estado" name="user_status">
                            <option value="1" <?php echo ($result->user_status == 1 ? 'selected="selected"' : "");
                                                ?>>Activo</option>
                            <option value="0" <?php echo ($result->user_status == 0 ? 'selected="selected"' : ""); ?>>De
                                baja</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Enviar</button>
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
    $url = "http://localhost/guia9/api/editar";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $headers = array(
        "Accept: application/json",
        "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_status = $_POST['user_status'];
    $data = <<<DATA
    {
    "user_id": "$user_id",
    "username": "$username",
    "user_email": "$user_email",
    "user_status": $user_status
    }
    DATA;
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    $resp = curl_exec($curl);
    curl_close($curl);
    if ($resp == "Exito") {
        echo "<script>alert('registro actualizado exitosamente');document.location='index.php'</script>";
    } else {
        echo "<script>alert('No se pudo actualizar el registro');document.location='index.php'</script>";
    }
}
?>