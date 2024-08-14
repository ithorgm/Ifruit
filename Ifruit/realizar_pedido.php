<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Pedido | Ifuit</title>
    <link rel="stylesheet" href="css/Agregar_Producto.css">
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
            <h1>Información del Pedido</h1>
            <table class="form-table">
                <tr>
                    <td>
                        <label for="cliente_id">Cliente:</label>
                        <select class="custom-select form-control" id="cliente_id" name="cliente_id" required>
                            <!-- Opciones de clientes desde la base de datos -->
                            <?php
                            $conex = mysqli_connect("localhost", "garciamaya_Kevin", "Kraitos0812", "garciamaya_ifuit");

                            // Verificar la conexión a la base de datos
                            if (!$conex) {
                                die('Error de conexión: ' . mysqli_connect_error());
                            }

                            // Consulta para obtener los clientes desde la base de datos
                            $sql = "SELECT id, nombre FROM cliente";
                            $result = mysqli_query($conex, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
                            }

                            // Cierra la conexión a la base de datos
                            mysqli_close($conex);
                            ?>
                        </select>
                    </td>
                    <td>
                        <label for="estatus_id">Estatus:</label>
                        <select class="custom-select form-control" id="estatus_id" name="estatus_id" required>
                            <!-- Opciones de estatus desde la base de datos -->
                            <?php
                            $conex = mysqli_connect("localhost", "garciamaya_Kevin", "Kraitos0812", "garciamaya_ifuit");

                            // Verificar la conexión a la base de datos
                            if (!$conex) {
                                die('Error de conexión: ' . mysqli_connect_error());
                            }

                            // Consulta para obtener los estatus desde la base de datos
                            $sql = "SELECT id, descripcion FROM estatus_pedido";
                            $result = mysqli_query($conex, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['id'] . '">' . $row['descripcion'] . '</option>';
                            }

                            // Cierra la conexión a la base de datos
                            mysqli_close($conex);
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="form-container">
        <form action="procesar_pedido.php" method="post">
            <!-- Campos para la información de productos -->
            <div class="producto-container">
                <label for="producto_id">Producto:</label>
                <select class="custom-select form-control" id="producto_id" name="producto_id[]" required>
                    <!-- Opciones de productos desde la base de datos -->
                    <?php
                    $conex = mysqli_connect("localhost", "root", "", "ifuit");

                    // Verificar la conexión a la base de datos
                    if (!$conex) {
                        die('Error de conexión: ' . mysqli_connect_error());
                    }

                    // Consulta para obtener los productos desde la base de datos
                    $sql = "SELECT id, nombre_producto FROM producto";
                    $result = mysqli_query($conex, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['id'] . '">' . $row['nombre_producto'] . '</option>';
                    }

                    // Cierra la conexión a la base de datos
                    mysqli_close($conex);
                    ?>
                </select>

                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad[]" min="1" required>

                <label for="unidad">Unidad:</label>
                <select class="custom-select form-control" id="unidad" name="unidad[]" required>
                    <option value="Kg">Kilogramo (Kg)</option>
                    <option value="Tonelada">Tonelada</option>
                    <option value="Caja">Caja</option>
                    <option value="Pieza">Pieza</option>
                    <option value="Bulto">Bulto</option>
                    <option value="Ramo">Ramo</option>
                </select>

                <button type="button" onclick="agregarProducto()">Agregar Producto</button>
            </div>

            <!-- Tabla para mostrar la información del pedido -->
            <div class="pedido-info-container">
                <h2>Información del Pedido</h2>
                <table class="pedido-info-table">
                    <tr>
                        <th>ID del Pedido</th>
                        <th>ID del Cliente</th>
                        <th>Estatus</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Unidad</th>
                    </tr>
                    <!-- Puedes agregar dinámicamente las filas con JavaScript después de agregar un producto -->
                </table>
            </div>

            <!-- Otros campos del pedido -->
            <!-- ... (otros campos como fecha, cliente, etc.) ... -->

            <button type="submit">Realizar Pedido</button>
        </form>
    </div>

    <script>
        // Función para agregar dinámicamente campos de productos
        function agregarProducto() {
            // Obtener los valores de los campos
            const productoSelect = document.getElementById('producto_id');
            const cantidadInput = document.getElementById('cantidad');
            const unidadSelect = document.getElementById('unidad');

            // Obtener la tabla de información del pedido
            const pedidoInfoTable = document.querySelector('.pedido-info-table');

            // Crear una nueva fila y celdas
            const newRow = pedidoInfoTable.insertRow(-1);
            const cells = Array.from({ length: 6 }, () => newRow.insertCell());

            // Llenar las celdas con los valores de los campos
            cells[0].innerText = 'ID_PEDIDO'; // Puedes cambiar esto con un valor real
            cells[1].innerText = document.getElementById('cliente_id').value; // Obtener el valor del cliente
            cells[2].innerText = document.getElementById('estatus_id').value; // Obtener el valor del estatus
            cells[3].innerText = productoSelect.options[productoSelect.selectedIndex].text;
            cells[4].innerText = cantidadInput.value;
            cells[5].innerText = unidadSelect.options[unidadSelect.selectedIndex].text;

            // Limpiar los campos de producto, cantidad y unidad
            productoSelect.value = '';
            cantidadInput.value = '';
            unidadSelect.value = '';
        }
    </script>
</body>
</html>
