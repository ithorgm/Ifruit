<?php
$conex = mysqli_connect("localhost", "garciamaya_Kevin", "Kraitos0812", "garciamaya_ifuit");

// Verificar la conexión a la base de datos
if (!$conex) {
    die('Error de conexión: ' . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios | Ifuit</title>
    <link rel="stylesheet" href="css/clientes.css">
</head>
<body>
    <div class="contenedor">
        <div class="navegador">
            <ul>
                <img src="imagenes/APPLE.png" alt="" style="max-width: 60px;">
                <img src="imagenes/texto.png" alt="" style="max-width: 100px;">
            </ul>
        </div>
    </div>

    <div class="table-container">
        <div class="table-header">
            <h1>Lista de Usuarios</h1>
            <a href="Agregar_usuario.php">
                <button class="nuevo-button">Nuevo</button>
            </a>
            <br><br>
        </div>
        <table class="customer-table">
            <tr class="fila-blanca">
                <td>ID Usuario</td>
                <td>Nombre de Usuario</td>
                <td>ID Empleado</td>
                <td>ID Rol</td>
                <td>Operaciones</td>
            </tr>

            <?php
            $sql = "SELECT u.id, u.nombre_usuario, u.empleado_id, u.role_id 
                    FROM usuario u";
            $result = mysqli_query($conex, $sql);

            while ($mostrar = mysqli_fetch_array($result)) {
            ?>
                <tr class="fila-negra">
                    <td><?php echo $mostrar['id'] ?></td>
                    <td><?php echo $mostrar['nombre_usuario'] ?></td>
                    <td><?php echo $mostrar['empleado_id'] ?></td>
                    <td><?php echo $mostrar['role_id'] ?></td>
                    <td>
                        <button class="editar-button" onclick="window.location.href = 'editar_usuario.php?id=<?php echo $mostrar['id'] ?>'">Editar</button>
                        <button class="eliminar-button" onclick="confirmarEliminacion(<?php echo $mostrar['id'] ?>)">Eliminar</button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <br><br>
        <a href="Inmen.html">
                <button class="nuevo-button">Regresar</button>
            </a>
    </div>

    <script>
        function confirmarEliminacion(id) {
            if (confirm("¿Estás seguro de que deseas eliminar este usuario?")) {
                // Redirige a eliminar_usuario.php pasando el ID como parámetro en la URL
                window.location.href = "eliminar_usuario.php?id=" + id;
            }
        }
    </script>
</body>
</html>
