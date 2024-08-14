<?php
// Conexión a la base de datos
$conex = mysqli_connect("localhost", "garciamaya_Kevin", "Kraitos0812", "garciamaya_ifuit");

// Verificar la conexión
if (!$conex) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

// Obtener datos del formulario
$fecha_pedido = $_POST['fecha_pedido'];
$cliente_id = $_POST['facturar_a'];
$estatus_id = $_POST['estatus'];
$total = $_POST['total'];

// Insertar nuevo pedido
$insert_pedido_query = "INSERT INTO pedido (fecha_pedido, cliente_id, estatus_id, total) VALUES ('$fecha_pedido', '$cliente_id', '$estatus_id', '$total')";
$result_pedido = mysqli_query($conex, $insert_pedido_query);

// Verificar la inserción del pedido
if (!$result_pedido) {
    die("Error al insertar el pedido: " . mysqli_error($conex));
}

// Obtener el ID del último pedido insertado
$pedido_id = mysqli_insert_id($conex);

// Obtener datos del detalle del pedido
$producto_id = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$precio_unitario = $_POST['precio_unitario'];
$subtotal = $_POST['subtotal'];

// Insertar detalle del pedido
$insert_detalle_query = "INSERT INTO detalle_pedido (pedido_id, producto_id, cantidad, precio_unitario, subtotal) VALUES ('$pedido_id', '$producto_id', '$cantidad', '$precio_unitario', '$subtotal')";
$result_detalle = mysqli_query($conex, $insert_detalle_query);

// Verificar la inserción del detalle del pedido
if (!$result_detalle) {
    die("Error al insertar el detalle del pedido: " . mysqli_error($conex));
}

// Cerrar la conexión
mysqli_close($conex);

// Redirigir a la página de pedidos
header("Location: pedidos.php");
?>
