<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Eliminar usuario con PDO</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <h1>Eliminar Usuario</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <a href="index.php" class="btn btn-default">Volver</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <form action="delete.php" method="POST">
                    <?php
                    if (!empty($_GET['id'])) {
                        $id = $_GET['id'];
                        include 'connection.php';
                        $cn = Database::connect();
                        $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $query = $cn->prepare("SELECT * FROM usuario WHERE idusuario = ?");
                        $query->execute(array($id));
                        $data = $query->fetch(PDO::FETCH_ASSOC);
                        Database::disconnect();
                    ?>
                        <div>
                            <label>ID:</label>
                            <input type="text" value="<?php echo $data['idusuario']; ?>" readonly name="idusuario">
                        </div>
                        <div>
                            <label>Nombre:</label>
                            <input type="text" value="<?php echo $data['nombre']; ?>" readonly name="nombre">
                        </div>
                        <div>
                            <label>Apellido:</label>
                            <input type="text" value="<?php echo $data['apellido']; ?>" readonly name="apellido">
                        </div>
                        <div>
                            <label>Edad:</label>
                            <input type="text" value="<?php echo $data['edad']; ?>" readonly name="edad">
                        </div>
                        <div>
                            <label>Género:</label>
                            <input type="text" value="<?php echo $data['genero']; ?>" readonly name="genero">
                        </div>
                        <div>
                            <label>Ciudad:</label>
                            <input type="text" value="<?php echo $data['ciudad']; ?>" readonly name="ciudad">
                        </div>
                        <div>
                            <input type="hidden" name="confirm" value="yes">
                            <input type="submit" class="btn btn-danger" value="Eliminar">
                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                        </div>
                    <?php
                    } else {
                        echo "<p>Error: No se proporcionó un ID válido.</p>";
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>

<?php
if (!empty($_POST['confirm']) && $_POST['confirm'] === 'yes') {
    include 'connection.php';
    $id = $_POST['idusuario'];
    $cn = Database::connect();
    $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $cn->prepare("DELETE FROM usuario WHERE idusuario = ?");
    $query->execute(array($id));
    Database::disconnect();
    header("Location: index.php");
    exit;
}
?>