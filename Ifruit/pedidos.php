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
    <title>Pedidos | Ifuit</title>
    <link rel="stylesheet" href="css/productos.css">
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
            <h1>Lista de Pedidos</h1>
            <a href="agregar_pedido.php">
                <button class="nuevo-button">Nuevo Pedido</button>
            </a>
            <br><br>
        </div>
        <table class="customer-table">
            <tr class="fila-blanca">
                <td>ID</td>
                <td>Fecha de Pedido</td>
                <td>Cliente</td>
                <td>Estado</td>
                <td>Total</td>
                <td>Operaciones</td>
            </tr>

            <?php
            $sql = "SELECT p.id, p.fecha_pedido, c.nombre AS nombre_cliente, ep.descripcion AS estado_pedido, p.total 
                    FROM pedido p 
                    JOIN cliente c ON p.cliente_id = c.id 
                    JOIN estatus_pedido ep ON p.estatus_id = ep.id";
            $result = mysqli_query($conex, $sql);

            while ($mostrar = mysqli_fetch_array($result)) {
            ?>
                <tr class="fila-negra">
                    <td><?php echo $mostrar['id'] ?></td>
                    <td><?php echo $mostrar['fecha_pedido'] ?></td>
                    <td><?php echo $mostrar['nombre_cliente'] ?></td>
                    <td><?php echo $mostrar['estado_pedido'] ?></td>
                    <td><?php echo $mostrar['total'] ?></td>
                    <td>
                        <button class="editar-button" onclick="window.location.href = 'editar_pedido.php?id=<?php echo $mostrar['id'] ?>'">Editar</button>
                        <button class="editar-button" onclick="window.location.href = 'detalles_pedido.php?id=<?php echo $mostrar['id'] ?>'">Detalles</button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <br>
        <br>
        <a href="Inmen.html">
            <button class="nuevo-button">Regresar</button>
        </a>
    </div>
</body>
</html>
