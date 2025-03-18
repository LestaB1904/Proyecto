<?php
// Iniciar sesión
session_start();

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Aquí puedes agregar la lógica para validar las credenciales del usuario
    // Por ejemplo, consultar una base de datos para verificar el usuario y contraseña

    // Si la validación es exitosa, establece las variables de sesión
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;

    // Redirigir según el rol seleccionado
    if ($role === 'administrador') {
        header("Location: panel_admin.php");
    } else {
        header("Location: panel_usuario.php");
    }
    exit();
} else {
    // Si el formulario no fue enviado, redirigir al formulario de inicio de sesión
    header("Location: index.php");
    exit();
}
?>

