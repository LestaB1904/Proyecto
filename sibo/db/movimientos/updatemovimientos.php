<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_POST['id_usuario'];
    $id_herramienta = $_POST['id_herramienta'] ?? NULL;
    $id_repuesto = $_POST['id_repuesto'] ?? NULL;
    $id_maquina = $_POST['id_maquina'] ?? NULL;

    $sql = "INSERT INTO movimientos (ID_Usuario, ID_Herramienta, ID_Repuesto, ID_Maquina) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiii", $id_usuario, $id_herramienta, $id_repuesto, $id_maquina);

    echo $stmt->execute() ? "Movimiento registrado correctamente." : "Error: " . $stmt->error;

    $stmt->close();
    $conn->close();
}
?>
