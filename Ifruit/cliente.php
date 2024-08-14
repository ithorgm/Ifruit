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
    <title>Clientes | Ifuit</title>
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
            <h1>Lista de Clientes</h1>
            <a href="Agregar_cliente.php">
                <button class="nuevo-button">Nuevo</button>
            </a>
            <br><br>
        </div>
        <table class="customer-table">
            <tr class="fila-blanca">
                <td>ID</td>
                <td>Nombre</td>
                <td>Dirección ID</td>
                <td>Correo Electrónico</td>
                <td>Teléfono</td>
                <td>Operaciones</td>
            </tr>

            <?php
            $sql = "SELECT c.id, c.nombre, c.direccion_id, c.correo_electronico, c.telefono 
                    FROM cliente c";
            $result = mysqli_query($conex, $sql);

            while ($mostrar = mysqli_fetch_array($result)) {
            ?>
                <tr class="fila-negra">
                    <td><?php echo $mostrar['id'] ?></td>
                    <td><?php echo $mostrar['nombre'] ?></td>
                    <td><?php echo $mostrar['direccion_id'] ?></td>
                    <td><?php echo $mostrar['correo_electronico'] ?></td>
                    <td><?php echo $mostrar['telefono'] ?></td>
                    <td>
                        <button class="editar-button" onclick="window.location.href = 'editar_cliente.php?id=<?php echo $mostrar['id'] ?>'">Editar</button>
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
            if (confirm("¿Estás seguro de que deseas eliminar este cliente?")) {
                // Redirige a eliminar_cliente.php pasando el ID como parámetro en la URL
                window.location.href = "eliminar_cliente.php?id=" + id;
            }
        }
    </script>
</body>
</html>
