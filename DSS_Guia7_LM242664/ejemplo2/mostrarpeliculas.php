<?php
spl_autoload_register(function ($classname) {
    require_once("udb_" . $classname . ".class.php");
});

$limit = isset($_GET['limit']) ? (($_GET['limit'] == 'all') ? 1000 : (int)$_GET['limit']) : 5;
$paginacion = new paginacion();
$npage = isset($_GET['npag']) ? $_GET['npag'] : 1;
$npage = $paginacion->getnumpages($npage);

$db = DataBase::getInstance();
$sql = "SELECT SQL_CALC_FOUND_ROWS titulopelicula, descripcion, nombre, imgpelicula, generopelicula FROM pelicula ";
$sql .= "JOIN genero ON pelicula.idgenero = genero.idgenero ";
$sql .= "JOIN director ON pelicula.iddirector = director.iddirector ";
$sql .= "LIMIT " . $paginacion->getoffset($limit) . ", " . $limit;

$sqlTotal = "SELECT FOUND_ROWS() AS total";
$db->setQuery($sql);
$pelis = $db->loadObjectList();
$regstotal = $db->getNumRows($sqlTotal);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Consultas de varias tablas</title>
    <link rel="stylesheet" href="css/tablas.css" />
    <script src="js/modernizr.custom.lis.js"></script>
</head>

<body>
    <section>
        <form method="GET" action="">
            <label for="limit">Mostrar:</label>
            <select name="limit" id="limit" onchange="this.form.submit()">
                <option value="3" <?= ($limit == 3) ? 'selected' : '' ?>>3</option>
                <option value="5" <?= ($limit == 5) ? 'selected' : '' ?>>5</option>
                <option value="10" <?= ($limit == 10) ? 'selected' : '' ?>>10</option>
                <option value="all" <?= ($limit == 1000) ? 'selected' : '' ?>>Todos</option>
            </select>
            <noscript><button type="submit">Actualizar</button></noscript>
        </form>
        <article>
            <?php
            $tabla = "<table class=\"tablaps\">\n";
            $tabla .= "<caption>Información de las películas en existencia</caption>\n";
            $tabla .= "<thead>\n\t<tr>\n\t\t<th>TÍTULO</th>\n\t\t<th>PORTADA</th>\n<th>SINOPSIS</th>\n<th>DIRECTOR</th>\n<th>GÉNERO</th>\n</tr>\n</thead>\n<tbody>\n";
            $contador = 1;
            foreach ($pelis as $pelicula) {
                $clase = ($contador % 2 == 1) ? "impar" : "par";
                $tabla .= "<tr class=\"" . $clase . "\">\n<td>" . $pelicula['titulopelicula'] . "</td>\n";
                $tabla .= "<td><img src=\"" . $pelicula['imgpelicula'] . "\" alt=\"" . $pelicula['nombre'] . "\" /></td>\n";
                $tabla .= "<td>" . $pelicula['descripcion'] . "</td>\n";
                $tabla .= "<td>" . $pelicula['nombre'] . "</td>\n";
                $tabla .= "<td>" . $pelicula['generopelicula'] . "</td>\n</tr>\n";
                $contador++;
            }
            $tabla .= "</tbody>\n<tfoot>\n<tr>\n<th colspan=\"5\">" . $paginacion->showlinkspages($regstotal, $limit) . "</th>\n</tr>\n</tfoot>\n";
            $tabla .= "</table>\n";
            echo $tabla;
            ?>
        </article>
    </section>
    <br>
    <hr>
    <footer style="background-color: white; color: black; display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <h3>Estudiante: José Adrián López Medina - LM242664</h3>
        <h4>Técnico en Ingeniería en Computación - Escuela de Computación Ciclo I - 2025</h4>
    </footer>
</body>

</html>