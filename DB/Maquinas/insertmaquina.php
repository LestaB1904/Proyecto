<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];

    $sql = "INSERT INTO Maquinas (Tipo_Maquina, Marca) 
            VALUES ('$tipo', '$marca')";

    if ($conn->query($sql) === TRUE) {
        echo "Máquina agregada correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
