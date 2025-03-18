
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIBO - Panel de Administrador</title>
    <link rel="stylesheet" href="../sibo/Frontend/css/estilodeladmin.css">
</head>
<body>
    <header>
        <h1>Bienvenido al Panel de Administrador</h1>
    </header>
    <main>
        <p>Aquí podrás gestionar herramientas y repuestos.</p>
        <!-- Formulario de selección de tabla -->
        <form method="post" action="">
            <label for="tabla">Selecciona la tabla a visualizar:</label>
            <select name="tabla" id="tabla">
                <option value="herramientas">Herramientas</option>
                <option value="repuestos">Repuestos</option>
            </select>
            <button type="submit">Mostrar Tabla</button>
        </form>
        <!-- Formularios de gestión -->
        <form action="insert_herramienta.php" method="post">
            <label for="nombre">Nombre de la Herramienta:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="cantidad">Cantidad:</label>
            <input type="text" id="cantidad" name="cantidad" required>
            <button type="submit">Agregar Herramienta</button>
        </form>
        <form action="delete_herramienta.php" method="post">
            <label for="id">ID de la Herramienta a Eliminar:</label>
            <input type="number" id="id" name="id" required>
            <button type="submit">Eliminar Herramienta</button>
        </form>
        <!-- Sección para mostrar la tabla seleccionada -->
        <?php
        include 'config.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tabla'])) {
            $tabla = $_POST['tabla'];
            if ($tabla == 'herramientas') {
                $sql = "SELECT * FROM herramientas";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<h2>Lista de Herramientas</h2>";
                    echo "<table><tr><th>ID</th><th>Nombre</th><th>Cantidad</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["Nombre_Herramienta"]. "</td><td>" . $row["Cantidad"]. "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No hay herramientas disponibles.</p>";
                }
            } elseif ($tabla == 'repuestos') {
                $sql = "SELECT * FROM repuestos";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<h2>Lista de Repuestos</h2>";
                    echo "<table><tr><th>ID</th><th>Nombre</th><th>Cantidad</th><th>ID Máquina</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["Nombre"]. "</td><td>" . $row["Cantidad"]. "</td><td>" . $row["ID_Maquina"]. "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No hay repuestos disponibles.</p>";
                }
            }
        }
        $conn->close();
        ?>
    </main>
    <footer>
        <p>&copy; 2025 SIBO - Todos los derechos reservados</p>
    </footer>
</body>
</html>