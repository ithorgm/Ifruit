<?php
$conex = mysqli_connect("localhost", "garciamaya_Kevin", "Kraitos0812", "garciamaya_ifuit");

if (!$conex) {
    die('Error de conexión: ' . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id_empleado = $_GET['id'];

    $sql = "SELECT * FROM empleado WHERE id = $id_empleado";
    $result = mysqli_query($conex, $sql);

    if ($result && $empleado = mysqli_fetch_assoc($result)) {
        // Datos del empleado recuperados correctamente
    } else {
        echo 'Empleado no encontrado';
        exit;
    }
} else {
    echo 'ID del empleado no proporcionado';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado | Ifuit</title>
    <link rel="stylesheet" href="css/Agregar_Producto.css">
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
            <h1>Editar Empleado</h1>
            <br><br><br><br><br><br>
            <form method="post" action="guardar_edicion_empleado.php">
                <input type="hidden" name="id_empleado" value="<?php echo $empleado['id']; ?>">
                <table class="form-table">
                    <tr>
                        <td>
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe el nombre del empleado" value="<?php echo $empleado['nombre']; ?>" required>
                        </td>
                        <td>
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Escribe el apellido del empleado" value="<?php echo $empleado['apellido']; ?>" required>
                        </td>
                        <td>
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $empleado['fecha_nacimiento']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="direccion_id">Dirección ID</label>
                            <input type="text" class="form-control" id="direccion_id" name="direccion_id" placeholder="Ingresa la dirección ID" value="<?php echo $empleado['direccion_id']; ?>" required>
                        </td>
                        <td>
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresa el teléfono" value="<?php echo $empleado['telefono']; ?>" required>
                        </td>
                        <td>
                            <label for="correo_electronico">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" placeholder="Ingresa el correo electrónico" value="<?php echo $empleado['correo_electronico']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="salario">Salario</label>
                            <input type="text" class="form-control" id="salario" name="salario" placeholder="Ingresa el salario" value="<?php echo $empleado['salario']; ?>" required>
                        </td>
                        <td>
                            <label for="fecha_contratacion">Fecha de Contratación</label>
                            <input type="date" class="form-control" id="fecha_contratacion" name="fecha_contratacion" value="<?php echo $empleado['fecha_contratacion']; ?>" required>
                        </td>
                        <td>
                            <label for="cargo">Cargo</label>
                            <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Ingresa el cargo" value="<?php echo $empleado['cargo']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="departamento">Departamento</label>
                            <input type="text" class="form-control" id="departamento" name="departamento" placeholder="Ingresa el departamento" value="<?php echo $empleado['departamento']; ?>" required>
                        </td>
                        <td>
                            <label for="supervisor_id">Supervisor ID</label>
                            <input type="text" class="form-control" id="supervisor_id" name="supervisor_id" placeholder="Ingresa el supervisor ID" value="<?php echo $empleado['supervisor_id']; ?>">
                        </td>
                        <td>
                            <label for="role_id">Role ID</label>
                            <input type="text" class="form-control" id="role_id" name="role_id" placeholder="Ingresa el role ID" value="<?php echo $empleado['role_id']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <button type="submit" class="btn btn-primary" style="width: 110px;">Guardar</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
