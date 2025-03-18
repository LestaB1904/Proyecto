<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Usuario</title>
    <link rel="stylesheet" href="../Frontend/css/estilosdetodo.css">
</head>
<body>
    <header>
        <h1>Bienvenido al Panel del Usuario</h1>
    </header>
    <main>
        <p>Aquí podrás gestionar herramientas y repuestos.</p>
        <!-- Formulario para seleccionar la tabla a visualizar -->
        <form method="post" action="mostrar_tabla.php">
            <label for="tabla">Elige una tabla:</label>
            <select id="tabla" name="tabla">
                <option value="usuarios">Usuarios</option>
                <option value="herramientas">Herramientas</option>
                <option value="repuestos">Repuestos</option>
                <option value="maquinas">Máquinas</option>
            </select>
            <button type="submit">Mostrar</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 SIBO - Todos los derechos reservados</p>
    </footer>
</body>
</html>
