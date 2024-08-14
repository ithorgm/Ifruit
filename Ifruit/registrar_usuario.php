<?php
session_start();
include("conexion.php");

if (isset($_POST['nombre_usuario']) && isset($_POST['contrasena']) && isset($_POST['empleado_id']) && isset($_POST['role_id'])) {
    $nombre_usuario = mysqli_real_escape_string($conex, $_POST['nombre_usuario']);
    $contrasena = mysqli_real_escape_string($conex, $_POST['contrasena']);
    $empleado_id = mysqli_real_escape_string($conex, $_POST['empleado_id']);
    $role_id = mysqli_real_escape_string($conex, $_POST['role_id']);

    // Verificar si el nombre de usuario ya existe
    $consulta_existencia = "SELECT id FROM usuario WHERE nombre_usuario = '$nombre_usuario'";
    $resultado_existencia = mysqli_query($conex, $consulta_existencia);

    if (mysqli_num_rows($resultado_existencia) > 0) {
        $_SESSION['mensaje'] = 'El nombre de usuario ya está registrado. Por favor, elige otro.';
        $_SESSION['mensaje_color'] = 'red';
    } else {
        // Si no existe, continuar con el proceso de registro
        $contrasena_hash = password_hash($contrasena, PASSWORD_BCRYPT);

        $consulta = "INSERT INTO usuario (nombre_usuario, contrasena, empleado_id, role_id) VALUES ('$nombre_usuario', '$contrasena_hash', '$empleado_id', '$role_id')";
        $resultado = mysqli_query($conex, $consulta);

        if ($resultado) {
            $_SESSION['mensaje'] = 'El usuario se ha registrado exitosamente';
            $_SESSION['mensaje_color'] = 'green';
        } else {
            $_SESSION['mensaje'] = 'Ocurrió un error al registrar el usuario';
            $_SESSION['mensaje_color'] = 'red';
        }
    }
} else {
    $_SESSION['mensaje'] = 'Llena todos los campos';
    $_SESSION['mensaje_color'] = 'red';
}

// Redirigir solo si es necesario (si no es una petición AJAX, por ejemplo)
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    header('Location: Agregar_usuario.php');
    exit();
}
?>
