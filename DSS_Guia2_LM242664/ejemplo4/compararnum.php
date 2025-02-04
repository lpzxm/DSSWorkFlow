<!DOCTYPE html>
<html lang="es">

<head>
    <title>Contador de palabras</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Muli" />
    <link rel="stylesheet" href="./css/font.css" />
    <link rel="stylesheet" href="./css/formstyle.css" />
    <script src="./js/prefixfree.min.js"></script>
</head>

<body>
    <header>
        <h1>
            Resultados de la comparación de <?php echo $num1 = isset($_POST['numero1']) ?
                                                $_POST['numero1'] : 0; ?>,
            <?php echo $num2 = isset($_POST['numero3']) ? $_POST['numero2'] : 0; ?> y
            <?php echo $num3 = isset($_POST['numero3']) ? $_POST['numero3'] : 0; ?>
        </h1>
    </header>
    <section>
        <article>
            <p class="msg">
                <?php
                $elmayor = ($num1 > $num2) ? $num1 : $num2;
                $elmayor = ($elmayor > $num3) ? $elmayor : $num3;
                printf("El número mayor es: %d", $elmayor);
                ?>
            </p>
            <article>
    </section>
    <?php
    include("../footer.php")
    ?>
</body>

</html>