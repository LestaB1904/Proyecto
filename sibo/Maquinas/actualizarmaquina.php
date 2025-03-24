<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];

    $sql = "UPDATE Maquinas 
            SET Tipo_Maquina = '$tipo', Marca = '$marca' 
            WHERE ID = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Máquina actualizada correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
