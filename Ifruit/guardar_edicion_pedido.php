<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conex = mysqli_connect("localhost", "garciamaya_Kevin", "Kraitos0812", "garciamaya_ifuit");
    
    if (!$conex) {
        die('Error de conexión: ' . mysqli_connect_error());
    }

    $id_pedido = $_POST['id_pedido'];
    $fecha_pedido = $_POST['fecha_pedido'];
    $cliente_id = $_POST['cliente_id'];
    $estatus_id = $_POST['estatus_id'];
    $total = $_POST['total'];

    $sql = "UPDATE pedido 
            SET fecha_pedido = '$fecha_pedido', cliente_id = '$cliente_id', estatus_id = '$estatus_id', total = '$total' 
            WHERE id = $id_pedido";

    if (mysqli_query($conex, $sql)) {
        header('Location: lista_pedidos.php'); // Cambia 'lista_pedidos.php' por la página que muestra la lista de pedidos
    } else {
        echo 'Error al actualizar el pedido: ' . mysqli_error($conex);
    }

    mysqli_close($conex);
}
?>
