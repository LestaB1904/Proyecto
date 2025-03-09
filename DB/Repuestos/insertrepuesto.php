<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $id_maquina = $_POST['id_maquina'];

    $sql = "INSERT INTO Repuestos (Nombre, Cantidad, ID_Maquina) 
            VALUES ('$nombre', $cantidad, $id_maquina)";

    if ($conn->query($sql) === TRUE) {
        echo "Repuesto agregado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
