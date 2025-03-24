<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM herramientas WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    echo $stmt->execute() ? "Herramienta eliminada correctamente." : "Error: " . $stmt->error;

    $stmt->close();
    $conn->close();
}
?>
