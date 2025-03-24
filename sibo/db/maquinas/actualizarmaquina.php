<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];

    $sql = "UPDATE maquinas SET Tipo_Maquina=?, Marca=? WHERE ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $tipo, $marca, $id);

    if ($stmt->execute()) {
        echo "Máquina actualizada correctamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
