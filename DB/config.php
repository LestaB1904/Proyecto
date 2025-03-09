<?php
$servername = "localhost";
$username = "root";
$password = ""; // La contraseña generalmente está vacía en XAMPP
$dbname = "sibo";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
