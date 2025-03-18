<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Tabla</title>
    <link rel="stylesheet" href="../Frontend/css/estilosdeseleccionatabla.css">
    <style>
        /* Incluye aquí el CSS proporcionado anteriormente */
    </style>
    <script>
        // Función para enviar la tabla seleccionada y mostrar los datos
        function fetchTableData() {
            const tabla = document.getElementById("tabla").value;

            fetch("fetch_data.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: `tabla=${tabla}`,
            })
            .then((response) => response.text())
            .then((data) => {
                document.getElementById("resultado").innerHTML = data;
            })
            .catch((error) => console.error("Error:", error));
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Seleccionar Tabla</h1>
        <label for="tabla">Elige una tabla:</label>
        <br>
        <select id="tabla" onchange="fetchTableData()">
            <option value="Usuarios">Usuarios</option>
            <option value="Herramientas">Herramientas</option>
            <option value="Repuestos">Repuestos</option>
            <option value="Maquinas">Máquinas</option>
        </select>

        <div id="resultado">
            <!-- Aquí se mostrarán los datos de la tabla seleccionada -->
        </div>
    </div>
</body>
</html>

