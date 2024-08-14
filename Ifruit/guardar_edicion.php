<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conex = mysqli_connect("localhost", "garciamaya_Kevin", "Kraitos0812", "garciamaya_ifuit");
    
    if (!$conex) {
        die('Error de conexión: ' . mysqli_connect_error());
    }

    $id_producto = $_POST['id_producto'];
    $nombre_producto = $_POST['nombre_producto'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $unidad = $_POST['unidad']; // Agregado para la columna "unidad"
    $tipo_id = $_POST['tipo_id'];

    $sql = "UPDATE producto 
            SET nombre_producto = '$nombre_producto', descripcion = '$descripcion', precio = '$precio', stock = '$stock', unidad = '$unidad', tipo_id = '$tipo_id' 
            WHERE id = $id_producto";
    
    if (mysqli_query($conex, $sql)) {
        header('Location: producto.php');
    } else {
        echo 'Error al actualizar el producto: ' . mysqli_error($conex);
    }

    mysqli_close($conex);
}
?>
