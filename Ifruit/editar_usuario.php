<?php
$conex = mysqli_connect("localhost", "garciamaya_Kevin", "Kraitos0812", "garciamaya_ifuit");

if (!$conex) {
    die('Error de conexión: ' . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];

    $sql = "SELECT * FROM usuario WHERE id = $id_usuario";
    $result = mysqli_query($conex, $sql);

    if ($result && $usuario = mysqli_fetch_assoc($result)) {
        // Datos del usuario recuperados correctamente
    } else {
        echo 'Usuario no encontrado';
        exit;
    }
} else {
    echo 'ID del usuario no proporcionado';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario | Ifuit</title>
    <link rel="stylesheet" href="css/Agregar_cliente.css">
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
            <h1>Editar Usuario</h1>
            <br><br><br><br><br><br>
            <form method="post" action="guardar_edicion_usuario.php">
                <input type="hidden" name="id_usuario" value="<?php echo $usuario['id']; ?>">
                <table class="form-table">
                    <tr>
                        <td>
                            <label for="nombre_usuario">Nombre de Usuario</label>
                            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Escribe el nombre de usuario" value="<?php echo $usuario['nombre_usuario']; ?>" required>
                        </td>
                        <td>
                            <label for="contrasena">Contraseña</label>
                            <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Escribe la nueva contraseña">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="empleado_id">ID de Empleado</label>
                            <input type="text" class="form-control" id="empleado_id" name="empleado_id" placeholder="Ingrese el ID del empleado" value="<?php echo $usuario['empleado_id']; ?>" required>
                        </td>
                        <td>
                            <label for="role_id">ID de Rol</label>
                            <input type="text" class="form-control" id="role_id" name="role_id" placeholder="Ingrese el ID del rol" value="<?php echo $usuario['role_id']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary" style="width: 110px;">Guardar</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
