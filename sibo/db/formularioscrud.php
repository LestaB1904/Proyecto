<?php
function mostrar_formularios_crud($tabla) {
    switch ($tabla) {
        case 'herramientas':
            echo '<h3>Agregar Herramienta</h3>
            <form action="db/herramientas/insertherramienta.php" method="post">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="number" name="cantidad" placeholder="Cantidad" required>
                <button type="submit">Agregar</button>
            </form>

            <h3>Actualizar Herramienta</h3>
            <form action="db/herramientas/updateherramienta.php" method="post">
                <input type="number" name="id" placeholder="ID" required>
                <input type="text" name="nombre" placeholder="Nuevo Nombre" required>
                <input type="number" name="cantidad" placeholder="Nueva Cantidad" required>
                <button type="submit">Actualizar</button>
            </form>

            <h3>Eliminar Herramienta</h3>
            <form action="db/herramientas/eliminarherramienta.php" method="post">
                <input type="number" name="id" placeholder="ID" required>
                <button type="submit">Eliminar</button>
            </form>';
            break;

        case 'repuestos':
            echo '<h3>Agregar Repuesto</h3>
            <form action="db/repuestos/insertrepuesto.php" method="post">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="number" name="cantidad" placeholder="Cantidad" required>
                <input type="number" name="id_maquina" placeholder="ID Máquina" required>
                <button type="submit">Agregar</button>
            </form>

            <h3>Actualizar Repuesto</h3>
            <form action="db/repuestos/updaterepuesto.php" method="post">
                <input type="number" name="id" placeholder="ID" required>
                <input type="text" name="nombre" placeholder="Nuevo Nombre" required>
                <input type="number" name="cantidad" placeholder="Nueva Cantidad" required>
                <input type="number" name="id_maquina" placeholder="Nuevo ID Máquina" required>
                <button type="submit">Actualizar</button>
            </form>

            <h3>Eliminar Repuesto</h3>
            <form action="db/repuestos/eliminarrepuesto.php" method="post">
                <input type="number" name="id" placeholder="ID" required>
                <button type="submit">Eliminar</button>
            </form>';
            break;

        case 'usuarios':
            echo '<h3>Agregar Usuario</h3>
            <form action="db/usuarios/insertusuario.php" method="post">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="number" name="cedula" placeholder="Cédula" required>
                <input type="number" name="telefono" placeholder="Teléfono">
                <select name="tipo_usuario" required>
                    <option value="admin">Admin</option>
                    <option value="usuario">Usuario</option>
                </select>
                <button type="submit">Agregar</button>
            </form>

            <h3>Actualizar Usuario</h3>
            <form action="db/usuarios/updateusuario.php" method="post">
                <input type="number" name="id" placeholder="ID" required>
                <input type="text" name="nombre" placeholder="Nuevo Nombre" required>
                <input type="number" name="cedula" placeholder="Nueva Cédula" required>
                <input type="number" name="telefono" placeholder="Nuevo Teléfono">
                <select name="tipo_usuario" required>
                    <option value="admin">Admin</option>
                    <option value="usuario">Usuario</option>
                </select>
                <button type="submit">Actualizar</button>
            </form>

            <h3>Eliminar Usuario</h3>
            <form action="db/usuarios/eliminarusuario.php" method="post">
                <input type="number" name="id" placeholder="ID" required>
                <button type="submit">Eliminar</button>
            </form>';
            break;

        case 'maquinas':
            echo '<h3>Agregar Máquina</h3>
            <form action="db/maquinas/insertmaquina.php" method="post">
                <input type="text" name="tipo" placeholder="Tipo de Máquina" required>
                <input type="text" name="marca" placeholder="Marca" required>
                <button type="submit">Agregar</button>
            </form>

            <h3>Actualizar Máquina</h3>
            <form action="db/maquinas/actualizarmaquina.php" method="post">
                <input type="number" name="id" placeholder="ID" required>
                <input type="text" name="tipo" placeholder="Nuevo Tipo" required>
                <input type="text" name="marca" placeholder="Nueva Marca" required>
                <button type="submit">Actualizar</button>
            </form>

            <h3>Eliminar Máquina</h3>
            <form action="db/maquinas/eliminarmaquina.php" method="post">
                <input type="number" name="id" placeholder="ID" required>
                <button type="submit">Eliminar</button>
            </form>';
            break;

        default:
            echo '<p>No se ha definido un formulario para esta tabla.</p>';
    }
}
?>
