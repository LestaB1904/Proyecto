<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];
    $telefono = $_POST['telefono'];
    $tipo_usuario = $_POST['tipo_usuario'];

    $sql = "INSERT INTO Usuarios (Nombre, Cedula, Telefono, Tipo_Usuario) 
            VALUES ('$nombre', $cedula, $telefono, '$tipo_usuario')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario agregado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
