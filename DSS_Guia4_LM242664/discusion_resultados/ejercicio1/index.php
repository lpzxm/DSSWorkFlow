<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de numeros enteros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

    <h2 class="mb-3">Encuentra el número mayor y menor</h2>

    <form method="POST" onsubmit="return validarSeleccion();">
        <div class="mb-3">
            <label for="numero" class="form-label">Ingrese un número:</label>
            <input type="number" id="numero" class="form-control">
            <button type="button" class="btn btn-primary mt-2" onclick="agregarNumero()">Agregar</button>
        </div>

        <div class="mb-3">
            <label for="listaNumeros" class="form-label">Lista de números:</label>
            <select id="listaNumeros" name="numeros[]" class="form-select" multiple size="5"></select>
        </div>

        <button type="submit" class="btn btn-success">Calcular</button>
    </form>

    <?php
    function encontrarMayor(...$numeros)
    {
        return max($numeros);
    }

    function encontrarMenor(...$numeros)
    {
        return min($numeros);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["numeros"])) {
        $numeros = array_map('intval', $_POST["numeros"]);

        if (count($numeros) >= 2) {
            $mayor = encontrarMayor(...$numeros);
            $menor = encontrarMenor(...$numeros);

            echo "<div class='mt-3 alert alert-info'>";
            echo "<strong>Números seleccionados:</strong> " . implode(", ", $numeros) . "<br>";
            echo "<strong>Mayor:</strong> $mayor <br>";
            echo "<strong>Menor:</strong> $menor";
            echo "</div>";
        }
    }

    include "../../footer.php";
    ?>
    <script>
        function agregarNumero() {
            let inputNumero = document.getElementById("numero");
            let selectLista = document.getElementById("listaNumeros");

            if (inputNumero.value === "") {
                alert("Por favor, ingrese un número válido.");
                return;
            }

            let valor = inputNumero.value;
            let option = document.createElement("option");
            option.text = valor;
            option.value = valor;
            selectLista.add(option);

            inputNumero.value = ""; // Limpiar input
        }

        function validarSeleccion() {
            let selectLista = document.getElementById("listaNumeros");
            let seleccionados = [...selectLista.selectedOptions].map(opt => opt.value);

            if (seleccionados.length < 2) {
                alert("Debe seleccionar al menos dos números.");
                return false;
            }

            return true;
        }
    </script>

</body>

</html>