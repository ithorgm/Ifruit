<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conex = mysqli_connect("localhost", "garciamaya_Kevin", "Kraitos0812", "garciamaya_ifuit");
    
    if (!$conex) {
        die('Error de conexión: ' . mysqli_connect_error());
    }

    $id_usuario = $_POST['id_usuario'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];
    $empleado_id = $_POST['empleado_id'];
    $role_id = $_POST['role_id'];

    // Verificar si la contraseña se ha cambiado
    if (!empty($contrasena)) {
        $contrasena_hash = password_hash($contrasena, PASSWORD_BCRYPT);
        $sql = "UPDATE usuario 
                SET nombre_usuario = '$nombre_usuario', contrasena = '$contrasena_hash', empleado_id = '$empleado_id', role_id = '$role_id' 
                WHERE id = $id_usuario";
    } else {
        // Si la contraseña no se cambió, no actualizamos el campo de contraseña
        $sql = "UPDATE usuario 
                SET nombre_usuario = '$nombre_usuario', empleado_id = '$empleado_id', role_id = '$role_id' 
                WHERE id = $id_usuario";
    }

    if (mysqli_query($conex, $sql)) {
        header('Location: usuario.php');
    } else {
        echo 'Error al actualizar el usuario: ' . mysqli_error($conex);
    }

    mysqli_close($conex);
}
?>
