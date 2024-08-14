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
    <title>Productos | Ifuit</title>
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
            <h1>Lista de Productos</h1>
            <a href="Agregar_producto.php">
                <button class="nuevo-button">Nuevo</button>
            </a>
            <br><br>
        </div>
        <table class="customer-table">
            <tr class="fila-blanca">
                <td>id_producto</td>
                <td>nombre_producto</td>
                <td>descripcion</td>
                <td>precio</td>
                <td>stock</td>
                <td>unidad</td>
                <td>tipo</td>
                <td>Operaciones</td>
            </tr>

            <?php
            $sql = "SELECT p.id, p.nombre_producto, p.descripcion, p.precio, p.stock, p.unidad, t.nombre_tipo 
                    FROM producto p 
                    JOIN tipo t ON p.tipo_id = t.id";
            $result = mysqli_query($conex, $sql);

            while ($mostrar = mysqli_fetch_array($result)) {
            ?>
                <tr class="fila-negra">
                    <td><?php echo $mostrar['id'] ?></td>
                    <td><?php echo $mostrar['nombre_producto'] ?></td>
                    <td><?php echo $mostrar['descripcion'] ?></td>
                    <td><?php echo $mostrar['precio'] ?></td>
                    <td><?php echo $mostrar['stock'] ?></td>
                    <td><?php echo $mostrar['unidad'] ?></td>
                    <td><?php echo $mostrar['nombre_tipo'] ?></td>
                    <td>
                        <button class="editar-button" onclick="window.location.href = 'editar_Producto.php?id=<?php echo $mostrar['id'] ?>'">Editar</button>
                        <button class="eliminar-button" onclick="confirmarEliminacion(<?php echo $mostrar['id'] ?>)">Eliminar</button>
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

    <script>
        function confirmarEliminacion(id) {
            if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
                // Redirige a eliminar_producto.php pasando el ID como parámetro en la URL
                window.location.href = "eliminar_producto.php?id=" + id;
            }
        }
    </script>
</body>
</html>
