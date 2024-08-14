<?php
    // Conexión a la base de datos
    $conex = mysqli_connect("localhost", "garciamaya_Kevin", "Kraitos0812", "garciamaya_ifuit");

    // Verificar la conexión
    if (!$conex) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    // Obtener el ID del pedido desde la URL
    $pedido_id = $_GET['id'];

    // Consulta para obtener los detalles del pedido
    $sql = "SELECT p.fecha_pedido, c.nombre AS nombre_cliente, c.rfc, d.calle, d.ciudad, d.estado, d.codigo_postal,
            ep.descripcion AS estado_pedido, p.total, pr.nombre_producto, dp.cantidad, dp.precio_unitario, dp.subtotal
            FROM pedido p 
            JOIN cliente c ON p.cliente_id = c.id 
            JOIN direccion d ON c.direccion_id = d.id
            JOIN estatus_pedido ep ON p.estatus_id = ep.id
            JOIN detalle_pedido dp ON p.id = dp.pedido_id
            JOIN producto pr ON dp.producto_id = pr.id
            WHERE p.id = $pedido_id";
    
    $result = mysqli_query($conex, $sql);

    // Verificar la consulta
    if (!$result) {
        die("Error en la consulta: " . mysqli_error($conex));
    }

    // Obtener los resultados
    $detalles_pedido = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Pedido | Ifruit</title>
    <link rel="stylesheet" href="css/Agregar_Producto.css">
    <!-- Agrega tus estilos adicionales aquí -->
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

    <main role="main">
        <div class="table-container">
            <div class="table-header">
                <h1>Detalles del Pedido</h1>
            </div>

            <!-- Tabla para mostrar los detalles del pedido -->
            <table class="detalles-table">
                <tr>
                    <td>Fecha de Pedido:</td>
                    <td><?php echo $detalles_pedido['fecha_pedido']; ?></td>
                </tr>
                <tr>
                    <td>Facturar a:</td>
                    <td><?php echo $detalles_pedido['nombre_cliente']; ?></td>
                </tr>
                <tr>
                    <td>RFC:</td>
                    <td><?php echo $detalles_pedido['rfc']; ?></td>
                </tr>
                <tr>
                    <td>Dirección:</td>
                    <td><?php echo $detalles_pedido['calle'] . ', ' . $detalles_pedido['ciudad'] . ', ' . $detalles_pedido['estado'] . ', ' . $detalles_pedido['codigo_postal']; ?></td>
                </tr>
                <tr>
                    <td>Estatus:</td>
                    <td><?php echo $detalles_pedido['estado_pedido']; ?></td>
                </tr>
                <tr>
                    <td>Total:</td>
                    <td><?php echo $detalles_pedido['total']; ?></td>
                </tr>
                <tr>
                    <td>Producto:</td>
                    <td><?php echo $detalles_pedido['nombre_producto']; ?></td>
                </tr>
                <tr>
                    <td>Cantidad:</td>
                    <td><?php echo $detalles_pedido['cantidad']; ?></td>
                </tr>
                <tr>
                    <td>Precio Unitario:</td>
                    <td><?php echo $detalles_pedido['precio_unitario']; ?></td>
                </tr>
                <tr>
                    <td>Subtotal:</td>
                    <td><?php echo $detalles_pedido['subtotal']; ?></td>
                </tr>
            </table>

            <br><br>
            <div id="uno">
                <a href="pedidos.php">
                    <button class="regresar">Atras</button>
                </a>
            </div>
        </div>
    </main>

    <!-- Puedes agregar tu script JavaScript aquí si es necesario -->
</body>
</html>
