<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];

    $sql = "INSERT INTO Herramientas (Nombre_Herramienta, Cantidad) VALUES ('$nombre', '$cantidad')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Herramienta agregada correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
