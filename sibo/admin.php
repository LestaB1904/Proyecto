<?php
include 'db/config.php';
include 'db/formularioscrud.php';

$tablas = ['herramientas', 'repuestos', 'usuarios', 'maquinas'];
$tabla_seleccionada = $_POST['tabla'] ?? '';
$seccion = $_POST['seccion'] ?? '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIBO - Panel de Administrador</title>
    <link rel="stylesheet" href="Frontend/css/estilodeladmin.css">
</head>
<body>
    <header>
        <h1>Bienvenido al Panel de Administrador</h1>
    </header>
    <main>
        <?php if ($seccion === ''): ?>
            <form method="post" action="">
                <button type="submit" name="seccion" value="crud">Gestión CRUD</button>
                <button type="submit" name="seccion" value="ver_tablas">Ver Todas las Tablas</button>
                <button type="submit" name="seccion" value="asignar">Asignar Herramientas/Repuestos</button>
            </form>
        <?php endif; ?>

        <?php
        function mostrar_tabla($conn, $tabla) {
            $sql = "SELECT * FROM $tabla";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                echo "<h2>Lista de " . ucfirst($tabla) . "</h2><table><tr>";
                while ($col = $result->fetch_field()) {
                    echo "<th>{$col->name}</th>";
                }
                echo "</tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    foreach ($row as $valor) {
                        echo "<td>$valor</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No hay datos disponibles en la tabla $tabla.</p>";
            }
        }

        if ($seccion === 'crud') {
            echo '<form method="post" action="">
                    <input type="hidden" name="seccion" value="crud">
                    <label for="tabla">Selecciona la tabla a gestionar:</label>
                    <select name="tabla" id="tabla" onchange="this.form.submit()">';
            foreach ($tablas as $t) {
                $selected = ($t === $tabla_seleccionada) ? 'selected' : '';
                echo "<option value=\"$t\" $selected>" . ucfirst($t) . "</option>";
            }
            echo '</select></form>';

            if (!empty($tabla_seleccionada)) {
                mostrar_tabla($conn, $tabla_seleccionada);
                mostrar_formularios_crud($tabla_seleccionada);
            }
        }

        if ($seccion === 'ver_tablas') {
            echo "<h2>Contenido de Todas las Tablas</h2>";
            foreach ($tablas as $tabla) {
                mostrar_tabla($conn, $tabla);
            }
        }

        if ($seccion === 'asignar') {
            echo '<h2>Asignar Herramienta o Repuesto a Usuario</h2>
            <form action="db/movimientos/updatemovimientos.php" method="post">
                <label for="id_usuario">ID del Usuario:</label>
                <input type="number" name="id_usuario" required>
                <label for="id_herramienta">ID de Herramienta (opcional):</label>
                <input type="number" name="id_herramienta">
                <label for="id_repuesto">ID de Repuesto (opcional):</label>
                <input type="number" name="id_repuesto">
                <label for="id_maquina">ID de Máquina (opcional):</label>
                <input type="number" name="id_maquina">
                <button type="submit">Registrar Movimiento</button>
            </form>';
        }

        if (isset($_GET['mensaje'])) {
            echo '<div class="mensaje">' . htmlspecialchars($_GET['mensaje']) . '</div>';
        }

        $conn->close();
        ?>
    </main>
    <footer>
        <p>&copy; 2025 SIBO - Todos los derechos reservados</p>
    </footer>
</body>
</html>


