<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];

    $sql = "UPDATE Herramientas SET Nombre_Herramienta = '$nombre', Cantidad = '$cantidad' WHERE ID = $id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Herramienta actualizada correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

