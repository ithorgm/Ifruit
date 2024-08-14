<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conex = mysqli_connect("localhost", "garciamaya_Kevin", "Kraitos0812", "garciamaya_ifuit");
    
    if (!$conex) {
        die('Error de conexión: ' . mysqli_connect_error());
    }

    $id_cliente = $_POST['id_cliente'];
    $nombre = $_POST['nombre'];
    $direccion_id = $_POST['direccion_id'];
    $correo_electronico = $_POST['correo_electronico'];
    $telefono = $_POST['telefono'];

    $sql = "UPDATE cliente 
            SET nombre = '$nombre', direccion_id = '$direccion_id', correo_electronico = '$correo_electronico', telefono = '$telefono' 
            WHERE id = $id_cliente";
    
    if (mysqli_query($conex, $sql)) {
        header('Location: cliente.php');
    } else {
        echo 'Error al actualizar el cliente: ' . mysqli_error($conex);
    }

    mysqli_close($conexion);
}
?>
