<?php
$conex = mysqli_connect("localhost", "garciamaya_Kevin", "Kraitos0812", "garciamaya_ifuit");

if (!$conex) {
    die('Error de conexión: ' . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id_cliente = $_GET['id'];

    $sql = "SELECT * FROM cliente WHERE id = $id_cliente";
    $result = mysqli_query($conex, $sql);

    if ($result && $cliente = mysqli_fetch_assoc($result)) {
        // Datos del cliente recuperados correctamente
    } else {
        echo 'Cliente no encontrado';
        exit;
    }
} else {
    echo 'ID del cliente no proporcionado';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente | Ifuit</title>
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
            <h1>Editar Cliente</h1>
            <br><br><br><br><br><br>
            <form method="post" action="guardar_edicion_cliente.php">
                <input type="hidden" name="id_cliente" value="<?php echo $cliente['id']; ?>">
                <table class="form-table">
                    <tr>
                        <td>
                            <label for="nombre">Nombre del Cliente</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe el nombre del cliente" value="<?php echo $cliente['nombre']; ?>" required>
                        </td>
                        <td>
                            <label for="direccion_id">Dirección ID</label>
                            <input type="text" class="form-control" id="direccion_id" name="direccion_id" placeholder="Ingresa el ID de la dirección" value="<?php echo $cliente['direccion_id']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="correo_electronico">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" placeholder="Ingresa el correo electrónico" value="<?php echo $cliente['correo_electronico']; ?>" required>
                        </td>
                        <td>
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresa el número de teléfono" value="<?php echo $cliente['telefono']; ?>" required>
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
