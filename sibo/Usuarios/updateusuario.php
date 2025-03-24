<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];
    $telefono = $_POST['telefono'];
    $tipo_usuario = $_POST['tipo_usuario'];

    $sql = "UPDATE Usuarios 
            SET Nombre = '$nombre', Cedula = $cedula, Telefono = $telefono, Tipo_Usuario = '$tipo_usuario' 
            WHERE ID = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario actualizado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
