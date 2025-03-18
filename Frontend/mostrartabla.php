<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tabla = $_POST['tabla'];

    // Validar la tabla seleccionada para evitar inyecciones SQL
    $tablas_permitidas = ['usuarios', 'herramientas', 'repuestos', 'maquinas'];
    if (!in_array($tabla, $tablas_permitidas)) {
        echo "Tabla no válida.";
        exit;
    }

    $sql = "SELECT * FROM $tabla";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Datos de la tabla: " . ucfirst($tabla) . "</h2>";
        echo "<table border='1'>";
        echo "<tr>";

        // Obtener nombres de las columnas
        while ($columna = $result->fetch_field()) {
            echo "<th>" . ucfirst($columna->name) . "</th>";
        }
        echo "</tr>";

        // Obtener datos de las filas
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $celda) {
                echo "<td>" . htmlspecialchars($celda) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No hay datos disponibles en la tabla " . ucfirst($tabla) . ".";
    }

    $conn->close();
}
?>
