<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tabla = $_POST['tabla'];

    // Validar tabla seleccionada para evitar inyecciones SQL
    $tablas_permitidas = ['Usuarios', 'Herramientas', 'Repuestos', 'Maquinas'];
    if (!in_array($tabla, $tablas_permitidas)) {
        echo "Tabla no válida.";
        exit;
    }

    $sql = "SELECT * FROM $tabla";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Crear tabla en HTML
        echo "<table border='1'>";
        echo "<tr>";
        while ($columna = $result->fetch_field()) {
            echo "<th>" . $columna->name . "</th>";
        }
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $celda) {
                echo "<td>" . $celda . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No hay datos disponibles en la tabla $tabla.";
    }

    $conn->close();
}
?>
