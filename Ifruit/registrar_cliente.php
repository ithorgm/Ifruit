<?php
session_start();
include("conexion.php");

if (isset($_POST['nombre']) && isset($_POST['direccion_id']) && isset($_POST['correo_electronico']) && isset($_POST['telefono'])) {
    $nombre = mysqli_real_escape_string($conex, $_POST['nombre']);
    $direccion_id = mysqli_real_escape_string($conex, $_POST['direccion_id']);
    $correo_electronico = mysqli_real_escape_string($conex, $_POST['correo_electronico']);
    $telefono = mysqli_real_escape_string($conex, $_POST['telefono']);

    $consulta = "INSERT INTO cliente (nombre, direccion_id, correo_electronico, telefono) VALUES ('$nombre', '$direccion_id', '$correo_electronico', '$telefono')";
    $resultado = mysqli_query($conex, $consulta);

    if ($resultado) {
        $_SESSION['mensaje'] = 'El cliente se ha registrado exitosamente';
    } else {
        $_SESSION['mensaje'] = 'Ocurrió un error al registrar el cliente';
    }
} else {
    $_SESSION['mensaje'] = 'Llena todos los campos';
}

header('Location: Agregar_cliente.php');
exit();
?>
