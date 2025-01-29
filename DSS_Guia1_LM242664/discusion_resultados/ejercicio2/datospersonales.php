<?php
$nombreCompleto = <<<NAME
<p>Mi nombre completo es: <b>José Adrián López Medina</b></p>
NAME;

$lugarNacimiento = <<<NAC
<p>
        Nací el <b>5 de febrero de 2006</b>
        en <b>El Salvador, San Salvador</b>, por lo tanto mi nacionalidad es <b>Salvadoreño</b>.
    </p>
NAC;

$edad = 18;
$str1 = "Mi edad actualmente es de: " . $edad . " años";

$numeroCarnet = "LM242664";
$str2 = <<<UDB
<p>Y actualmente estudio en la Universidad Don Bosco en la carrera de <b>Tecnico en Ingenieria de Computación</b> y mi numero de Carnet es: $numeroCarnet</p>
UDB;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Personales</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Nombre Completo</th>
                <th>Lugar de Nacimiento</th>
                <th>Edad</th>
                <th>Carnet</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $nombreCompleto ?></td>
                <td><?= $lugarNacimiento ?></td>
                <td><?= $str1 ?></td>
                <td><?= $str2 ?></td>
            </tr>
        </tbody>
    </table>
    <?php
    include("../footer.php");
    ?>
</body>

</html>