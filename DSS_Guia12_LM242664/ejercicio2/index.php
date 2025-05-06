<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Biblioteca Rafael</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>

<body>

    <h1>BIBLIOTECA <span>RAFAEL</span></h1>

    <button id="btnLogin">Recursos Electrónicos</button>

    <div id="loginModal" title="Ingreso a los recursos electrónicos" style="display:none;">
        <form id="loginForm">
            <label>Usuario:</label><br>
            <input type="text" name="usuario" required><br>
            <label>Contraseña:</label><br>
            <input type="password" name="contrasena" required><br><br>
            <button type="submit">Enviar</button>
        </form>
    </div>

    <script src="js/script.js"></script>
</body>

</html>