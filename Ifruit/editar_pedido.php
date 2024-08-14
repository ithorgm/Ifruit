<?php
$conex = mysqli_connect("localhost", "garciamaya_Kevin", "Kraitos0812", "garciamaya_ifuit");

if (!$conex) {
    die('Error de conexión: ' . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id_pedido = $_GET['id'];

    $sql_pedido = "SELECT * FROM pedido WHERE id = $id_pedido";
    $result_pedido = mysqli_query($conex, $sql_pedido);

    if ($result_pedido && $pedido = mysqli_fetch_assoc($result_pedido)) {
        // Datos del pedido recuperados correctamente
    } else {
        echo 'Pedido no encontrado';
        exit;
    }

    // Obtener opciones para la lista de clientes
    $sql_clientes = "SELECT id, nombre FROM cliente";
    $result_clientes = mysqli_query($conex, $sql_clientes);

    // Obtener opciones para la lista de estatus
    $sql_estatus = "SELECT id, descripcion FROM estatus_pedido";
    $result_estatus = mysqli_query($conex, $sql_estatus);

} else {
    echo 'ID del pedido no proporcionado';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pedido | Ifuit</title>
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
            <h1>Editar Pedido</h1>
            <br><br><br><br><br><br>
            <form method="post" action="guardar_edicion_pedido.php">
                <input type="hidden" name="id_pedido" value="<?php echo $pedido['id']; ?>">
                <table class="form-table">
                    <tr>
                        <td>
                            <label for="fecha_pedido">Fecha de Pedido</label>
                            <input type="date" class="form-control" id="fecha_pedido" name="fecha_pedido" value="<?php echo $pedido['fecha_pedido']; ?>" required>
                        </td>
                        <td>
                            <label for="cliente_id">Cliente</label>
                            <select class="form-control" id="cliente_id" name="cliente_id" required>
                                <?php
                                while ($cliente = mysqli_fetch_assoc($result_clientes)) {
                                    $selected = ($cliente['id'] == $pedido['cliente_id']) ? 'selected' : '';
                                    echo "<option value='{$cliente['id']}' {$selected}>{$cliente['nombre']}</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="estatus_id">Estatus</label>
                            <select class="form-control" id="estatus_id" name="estatus_id" required>
                                <?php
                                while ($estatus = mysqli_fetch_assoc($result_estatus)) {
                                    $selected = ($estatus['id'] == $pedido['estatus_id']) ? 'selected' : '';
                                    echo "<option value='{$estatus['id']}' {$selected}>{$estatus['descripcion']}</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <label for="total">Total</label>
                            <input type="text" class="form-control" id="total" name="total" placeholder="Ingrese el total" value="<?php echo $pedido['total']; ?>" required>
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
