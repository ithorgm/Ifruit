<?php
$conex = mysqli_connect("localhost", "garciamaya_Kevin", "Kraitos0812", "garciamaya_ifuit");

if (!$conex) {
    die('Error de conexión: ' . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];

    $sql = "SELECT * FROM producto WHERE id = $id_producto";
    $result = mysqli_query($conex, $sql);

    if ($result && $producto = mysqli_fetch_assoc($result)) {
        // Datos del producto recuperados correctamente
    } else {
        echo 'Producto no encontrado';
        exit;
    }
} else {
    echo 'ID del producto no proporcionado';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto | Ifuit</title>
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
            <h1>Editar Producto</h1>
            <br><br><br><br><br><br>
            <form method="post" action="guardar_edicion.php">
                <input type="hidden" name="id_producto" value="<?php echo $producto['id']; ?>">
                <table class="form-table">
                    <tr>
                        <td>
                            <label for="nombre_producto">Nombre del Producto</label>
                            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Escribe el nombre del producto" value="<?php echo $producto['nombre_producto']; ?>" required>
                        </td>
                        <td>
                            <label for="descripcion">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Escribe la descripción del producto" value="<?php echo $producto['descripcion']; ?>" required>
                        </td>
                        <td>
                            <label for="precio">Precio</label>
                            <input type="text" class="form-control" id="precio" name="precio" placeholder="Ingresa el precio" value="<?php echo $producto['precio']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="stock">Stock</label>
                            <input type="text" class="form-control" id="stock" name="stock" placeholder="Ingresa la cantidad en stock" value="<?php echo $producto['stock']; ?>" required>
                        </td>
                        <td>
                            <label for="unidad">Unidad</label>
                            <select class="custom-select form-control" id="unidad" name="unidad" required>
                                <option value="Kg" <?php if ($producto['unidad'] === 'Kg') echo 'selected'; ?>>Kilogramo (Kg)</option>
                                <option value="Tonelada" <?php if ($producto['unidad'] === 'Tonelada') echo 'selected'; ?>>Tonelada</option>
                                <option value="Caja" <?php if ($producto['unidad'] === 'Caja') echo 'selected'; ?>>Caja</option>
                                <option value="Pieza" <?php if ($producto['unidad'] === 'Pieza') echo 'selected'; ?>>Pieza</option>
                                <option value="Bulto" <?php if ($producto['unidad'] === 'Bulto') echo 'selected'; ?>>Bulto</option>
                                <option value="Ramo" <?php if ($producto['unidad'] === 'Ramo') echo 'selected'; ?>>Ramo</option>
                            </select>
                        </td>
                        <td>
                            <label for="tipo_id">Tipo de Producto</label>
                            <select class="custom-select form-control" id="tipo_id" name="tipo_id" required>
                                <option value="1" <?php if ($producto['tipo_id'] === 1) echo 'selected'; ?>>Crucíferas</option>
                                <option value="2" <?php if ($producto['tipo_id'] === 2) echo 'selected'; ?>>Solanáceas</option>
                                <option value="3" <?php if ($producto['tipo_id'] === 3) echo 'selected'; ?>>Bulbos</option>
                                <option value="4" <?php if ($producto['tipo_id'] === 4) echo 'selected'; ?>>Legumbres</option>
                                <option value="5" <?php if ($producto['tipo_id'] === 5) echo 'selected'; ?>>Verduras de raíz</option>
                                <option value="6" <?php if ($producto['tipo_id'] === 6) echo 'selected'; ?>>Verduras de hojas verdes</option>
                                <option value="7" <?php if ($producto['tipo_id'] === 7) echo 'selected'; ?>>Frutas secas</option>
                                <option value="8" <?php if ($producto['tipo_id'] === 8) echo 'selected'; ?>>Frutas de vides</option>
                                <option value="9" <?php if ($producto['tipo_id'] === 9) echo 'selected'; ?>>Frutas de pepita</option>
                                <option value="10" <?php if ($producto['tipo_id'] === 10) echo 'selected'; ?>>Frutas tropicales</option>
                                <option value="11" <?php if ($producto['tipo_id'] === 11) echo 'selected'; ?>>Bayas</option>
                                <option value="12" <?php if ($producto['tipo_id'] === 12) echo 'selected'; ?>>Frutas de hueso</option>
                                <option value="13" <?php if ($producto['tipo_id'] === 13) echo 'selected'; ?>>Cítricos</option>
                            </select>
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
        <br><br>
        <a href="producto.php">
                <button class="nuevo-button">Cancelar</button>
            </a>
    </div>
</body>
</html>
