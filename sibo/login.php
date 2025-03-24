<?php
$usuario = $_POST['username'] ?? '';
$clave = $_POST['password'] ?? '';
$rol = $_POST['role'] ?? '';

if ($rol === 'administrador') {
    header("Location: admin.php");
    exit;
} elseif ($rol === 'usuario') {
    header("Location: usuario.php");
    exit;
} else {
    echo "Rol no válido o no seleccionado.";
}
?>

