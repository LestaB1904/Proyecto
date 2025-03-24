<?php
include 'db/config.php';

$tablas = ['herramientas', 'repuestos', 'usuarios', 'maquinas'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Usuario</title>
    <link rel="stylesheet" href="Frontend/css/estilodelusuario.css">
</head>
<body>
    <header>
        <h1>Bienvenido al Panel de Usuario</h1>
    </header>

    <main>
        <p>En este panel puedes visualizar el contenido de las tablas del sistema.</p>

        <?php
        function mostrar_tabla($conn, $tabla) {
            $sql = "SELECT * FROM $tabla";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                echo "<h2>Tabla: " . ucfirst($tabla) . "</h2>";
                echo "<table border='1'><tr>";
                while ($col = $result->fetch_field()) {
                    echo "<th>{$col->name}</th>";
                }
                echo "</tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    foreach ($row as $valor) {
                        echo "<td>$valor</td>";
                    }
                    echo "</tr>";
                }
                echo "</table><br>";
            } else {
                echo "<p>No hay datos disponibles en la tabla <strong>$tabla</strong>.</p>";
            }
        }

        foreach ($tablas as $tabla) {
            mostrar_tabla($conn, $tabla);
        }

        $conn->close();
        ?>
    </main>

    <footer>
        <p>&copy; 2025 SIBO - Todos los derechos reservados</p>
    </footer>
</body>
</html>
