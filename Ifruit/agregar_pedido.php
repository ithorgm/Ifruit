<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Pedido | Ifruit</title>
    <link rel="stylesheet" href="css/Agregar_Producto.css">
    <style>
        .formulario {
            background-color: #4CAF50; /* Color verde para el fondo del formulario */
            border: 1px solid #000; /* Borde negro de 1px */
            padding: 20px; /* Espaciado interno */
            width: 60%; /* Ajusta el ancho del formulario según tus preferencias */
            margin-top: 20px; /* Espaciado superior */
            margin-bottom: 20px; /* Espaciado inferior */
        }

        /* Estilos adicionales para mejorar la apariencia del formulario */
        .formulario label {
            display: block;
            margin-bottom: 8px;
        }

        .formulario input,
        .formulario select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        .boton-agregar {
            text-align: center;
        }

        .btn {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .regresar {
            background-color: #555;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .regresar:hover {
            background-color: #444;
        }
    </style>
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
                <h1>Pedido</h1>
            </div>
        </div>

        <?php
        // Conexión a la base de datos
        $conex = mysqli_connect("localhost", "garciamaya_Kevin", "Kraitos0812", "garciamaya_ifuit");

        // Verificar la conexión
        if (!$conex) {
            die("La conexión a la base de datos falló: " . mysqli_connect_error());
        }
        ?>

        <!-- Formulario para agregar pedido y detalle_pedido -->
        <form action="registrar_pedido.php" method="post">
            <div class="formulario">
                <div class="seccion-izquierda">
                    <label for="fecha_pedido">Fecha de Pedido:</label>
                    <input type="text" id="fecha_pedido" name="fecha_pedido" value="<?php echo date('Y-m-d'); ?>" readonly>
                    <br>

                    <label for="facturar_a">Facturar a:</label>
                    <select id="facturar_a" name="facturar_a">
                        <?php
                        // Consulta para obtener la lista de clientes
                        $consulta_clientes = "SELECT id, nombre, direccion_id, rfc FROM cliente";
                        $resultado_clientes = mysqli_query($conex, $consulta_clientes);

                        // Verificar la consulta de clientes
                        if (!$resultado_clientes) {
                            die("Error en la consulta de clientes: " . mysqli_error($conex));
                        }

                        // Iterar sobre los resultados y generar opciones del select
                        while ($cliente = mysqli_fetch_assoc($resultado_clientes)) {
                            echo '<option value="' . $cliente['id'] . '" data-direccion="' . $cliente['direccion_id'] . '" data-rfc="' . $cliente['rfc'] . '">' . $cliente['nombre'] . '</option>';
                        }
                        ?>
                    </select>
                    <br>

                    <label for="rfc">RFC:</label>
                    <input type="text" id="rfc" name="rfc" value="" readonly>
                    <br>

                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" value="" readonly>
                </div>

                <div class="seccion-derecha">
                    <label for="estatus">Estatus:</label>
                    <select id="estatus" name="estatus">
                        <?php
                        // Consulta para obtener la lista de estatus_pedido
                        $consulta_estatus = "SELECT id, descripcion FROM estatus_pedido";
                        $resultado_estatus = mysqli_query($conex, $consulta_estatus);

                        // Verificar la consulta de estatus_pedido
                        if (!$resultado_estatus) {
                            die("Error en la consulta de estatus_pedido: " . mysqli_error($conex));
                        }

                        // Iterar sobre los resultados y generar opciones del select
                        while ($estatus = mysqli_fetch_assoc($resultado_estatus)) {
                            echo '<option value="' . $estatus['id'] . '">' . $estatus['descripcion'] . '</option>';
                        }
                        ?>
                    </select>
                    <br>

                    <label for="total">Total:</label>
                    <input type="text" id="total" name="total" placeholder="Ingrese el total" required>
                    <br>

                    <!-- Detalle del pedido -->
                    <label for="producto">Producto:</label>
                    <select id="producto" name="producto">
                        <?php
                        // Consulta para obtener la lista de productos
                        $consulta_productos = "SELECT id, nombre_producto FROM producto";
                        $resultado_productos = mysqli_query($conex, $consulta_productos);

                        // Verificar la consulta de productos
                        if (!$resultado_productos) {
                            die("Error en la consulta de productos: " . mysqli_error($conex));
                        }

                        // Iterar sobre los resultados y generar opciones del select
                        while ($producto = mysqli_fetch_assoc($resultado_productos)) {
                            echo '<option value="' . $producto['id'] . '">' . $producto['nombre_producto'] . '</option>';
                        }
                        ?>
                    </select>
                    <br>

                    <label for="cantidad">Cantidad:</label>
                    <input type="text" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad" required>
                    <br>

                    <label for="precio_unitario">Precio Unitario:</label>
                    <input type="text" id="precio_unitario" name="precio_unitario" placeholder="Ingrese el precio unitario" required>
                    <br>

                    <label for="subtotal">Subtotal:</label>
                    <input type="text" id="subtotal" name="subtotal" placeholder="Ingrese el subtotal" required>
                </div>
            </div>

            <div class="boton-agregar">
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </form>

        <br><br>
        <div id="uno">
            <a href="pedidos.php">
                <button class="regresar">Atras</button>
            </a>
        </div>
    </main>

    <!-- Script JavaScript para actualizar dirección y RFC -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var selectCliente = document.getElementById('facturar_a');
            var inputDireccion = document.getElementById('direccion');
            var inputRFC = document.getElementById('rfc');

            selectCliente.addEventListener('change', function () {
                // Obtener la opción seleccionada
                var selectedOption = selectCliente.options[selectCliente.selectedIndex];

                // Actualizar los campos de dirección y RFC
                inputDireccion.value = selectedOption.getAttribute('data-direccion');
                inputRFC.value = selectedOption.getAttribute('data-rfc');
            });
        });
    </script>
</body>
</html>


