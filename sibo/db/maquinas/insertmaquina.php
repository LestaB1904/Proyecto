<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];

    $sql = "INSERT INTO maquinas (Tipo_Maquina, Marca) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $tipo, $marca);

    if ($stmt->execute()) {
        echo "Máquina agregada correctamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

