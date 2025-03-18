<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="../sibo/Frontend/css/estilosdelindex.css">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form action="procesar_login.php" method="post">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <label for="role">Selecciona tu rol:</label>
            <select id="role" name="role" required>
                <option value="usuario">Usuario</option>
                <option value="administrador">Administrador</option>
            </select>
            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>


