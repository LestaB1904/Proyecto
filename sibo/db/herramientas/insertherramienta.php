<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];

    $sql = "INSERT INTO herramientas (Nombre_Herramienta, Cantidad) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nombre, $cantidad);

    echo $stmt->execute() ? "Herramienta agregada correctamente." : "Error: " . $stmt->error;

    $stmt->close();
    $conn->close();
}
?>

