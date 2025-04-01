<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Ingresar nuevo usuario con API Rest</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-offset-2 col-md-8">
                        <h1>Crear un nuevo usuario</h1>
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
                <form action="nuevo.php" method="POST">
                    <div class="form-group">
                        <label for="nombre_usuario">Nombre Usuario</label>
                        <input type="text" class="form-control" placeholder="Nombre Usuario" name="username"
                            id="nombre_usuario" />
                    </div>
                    <div class="form-group">
                        <label for="correo_usuario">Correo Usuario</label>
                        <input type="text" class="form-control" placeholder="Correo Usuario" name="user_email"
                            id="correo_usuario" />
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" id="estado" name="user_status">
                            <option value="1" selected="selected">Activo</option>
                            <option value="0">De baja</option>
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
    $url = "http://localhost/DSSWorkFlow/DSS_Guia9_LM242664/api/insertar";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $headers = array(
        "Accept: application/json",
        "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_status = $_POST['user_status'];
    $data = <<<DATA
{
"username": "$username",
"user_email": "$user_email",
"user_status": $user_status
}
DATA;
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    $resp = curl_exec($curl);
    curl_close($curl);
    if ($resp == "Exito") {
        echo "<script>alert('registro agregado exitosamente');document.location='index.php'</script>";
    } else {
        echo "<script>alert('No se pudo agregar el registro');document.location='index.php'</script>";
    }
}
?>