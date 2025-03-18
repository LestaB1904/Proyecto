<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y sanitizar los datos recibidos
    $nombre = trim($_POST['nombre']);
    $cedula = intval($_POST['cedula']);
    $telefono = !empty($_POST['telefono']) ? intval($_POST['telefono']) : NULL;
    $tipo_usuario = trim($_POST['tipo_usuario']);

    // Preparar la sentencia SQL para prevenir inyecciones SQL
    $sql = "INSERT INTO usuarios (Nombre, Cedula, Telefono, Tipo_Usuario) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siis", $nombre, $cedula, $telefono, $tipo_usuario);

    if ($stmt->execute()) {
        // Iniciar sesión automáticamente después del registro
        session_start();
        $_SESSION['usuario_id'] = $stmt->insert_id;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['tipo_usuario'] = $tipo_usuario;

        // Redirigir según el tipo de usuario
        if ($tipo_usuario === 'administrador') {
            header("Location: panel_admin.php");
        } else {
            header("Location: panel_usuario.php");
        }
        exit(); // Asegura que el script termine después de la redire


