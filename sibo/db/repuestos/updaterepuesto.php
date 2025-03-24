<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $id_maquina = $_POST['id_maquina'];

    $sql = "UPDATE Repuestos 
            SET Nombre = '$nombre', Cantidad = $cantidad, ID_Maquina = $id_maquina 
            WHERE ID = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Repuesto actualizado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
