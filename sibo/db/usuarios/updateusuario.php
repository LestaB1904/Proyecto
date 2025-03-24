<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];
    $telefono = $_POST['telefono'];
    $tipo_usuario = $_POST['tipo_usuario'];

    $sql = "UPDATE usuarios SET Nombre=?, Cedula=?, Telefono=?, Tipo_Usuario=? WHERE ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissi", $nombre, $cedula, $telefono, $tipo_usuario, $id);

    if ($stmt->execute()) {
        echo "Usuario actualizado correctamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
