<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];

    $sql = "UPDATE herramientas SET Nombre_Herramienta = ?, Cantidad = ? WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nombre, $cantidad, $id);

    echo $stmt->execute() ? "Herramienta actualizada correctamente." : "Error: " . $stmt->error;

    $stmt->close();
    $conn->close();
}
?>

