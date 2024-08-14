<?php
session_start();
include("conexion.php");

if (isset($_POST['nombre_producto']) && isset($_POST['descripcion']) && isset($_POST['precio']) && isset($_POST['stock']) && isset($_POST['unidad']) && isset($_POST['tipo_id'])) {
    $nombre_producto = mysqli_real_escape_string($conex, $_POST['nombre_producto']);
    $descripcion = mysqli_real_escape_string($conex, $_POST['descripcion']);
    $precio = mysqli_real_escape_string($conex, $_POST['precio']);
    $stock = mysqli_real_escape_string($conex, $_POST['stock']);
    $unidad = mysqli_real_escape_string($conex, $_POST['unidad']);
    $tipo_id = mysqli_real_escape_string($conex, $_POST['tipo_id']);

    $consulta = "INSERT INTO producto (nombre_producto, descripcion, precio, stock, unidad, tipo_id) VALUES ('$nombre_producto', '$descripcion', '$precio', '$stock', '$unidad', '$tipo_id')";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        $_SESSION['mensaje'] = 'El producto se ha registrado exitosamente';
    } else {
        $_SESSION['mensaje'] = 'Ocurrió un error al registrar el producto';
    }
} else {
    $_SESSION['mensaje'] = 'Llena todos los campos';
}

header('Location: Agregar_producto.php');
exit();
?>
