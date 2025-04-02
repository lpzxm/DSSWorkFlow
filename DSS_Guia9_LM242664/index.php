<?php
//consumiendo nuestro webservice para obtener el conjunto de datos
$url = "http://localhost/DSS_Guia9_LM242664/api/listar";
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
$result = json_decode($response);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>CRUD con API Rest</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-offset-2 col-md-8">
                        <h1>CRUD con API Rest</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-offset-2 col-md-8">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <a href="nuevo.php" class="btn btn-primary">Create</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nombre Usuario</th>
                            <th class="text-center">Correo</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tabla = "";
                        foreach ($result as $row) {
                            $estado = ($row[3] == 1 ? 'Activo' : 'De baja');
                            $tabla .= <<<TABLA
<tr>
<td class="text-center">$row[0]</td>
<td class="text-center">$row[1]</td>
<td class="text-center">$row[2]</td>
<td class="text-center">$estado</td>
<td class="text-center">
<a href="editar.php?user_id=$row[0]" class="btn btn-success">Modificar</a>
<a href="eliminar.php?user_id=$row[0]" class="btn btn-danger">Eliminar</a>
</td>
</tr>
TABLA;
                        }
                        echo $tabla;
                        ?>
                    </tbody>
                </table>
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