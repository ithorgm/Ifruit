<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto | Ifruit</title>
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
    <main role="main">
        <div class="table-container">
            <div class="table-header">
                <h1>Agregar Producto</h1>
            </div>
        </div>
        <div id="tabla_P">
            <form action="registrar_producto.php" method="post">
                <table class="form-table">
                    <tr>
                        <td>
                            <label for="nombre_producto">Nombre del Producto</label>
                            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Escribe el nombre del producto" required>
                        </td>
                        <td>
                            <label for="descripcion">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Escribe la descripción del producto" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="precio">Precio</label>
                            <input type="text" class="form-control" id="precio" name="precio" placeholder="Ingresa el precio" required>
                        </td>
                        <td>
                            <label for="stock">Stock</label>
                            <input type="text" class="form-control" id="stock" name="stock" placeholder="Ingresa la cantidad en stock" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="tipo_id">Tipo de Producto</label>
                            <select class="custom-select form-control" id="tipo_id" name="tipo_id" required>
                                <option value="1">Crucíferas</option>
                                <option value="2">Solanáceas</option>
                                <option value="3">Bulbos</option>
                                <option value="4">Legumbres</option>
                                <option value="5">Verduras de raíz</option>
                                <option value="6">Verduras de hojas verdes</option>


                                <option value="7">Frutas secas</option>
                                <option value="8">Frutas de vides</option>
                                <option value="9">Frutas de pepita</option>
                                <option value="10">Frutas tropicales</option>
                                <option value="11">Bayas</option>
                                <option value="12">Frutas de hueso</option>
                                <option value="13">Cítricos</option>
                                <!-- Agrega más opciones según tus necesidades -->
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary" style="width: 110px;">Agregar</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <br><br>
        <div id="uno">
            <a href="producto.php">
                <button class="regresar">Atras</button>
            </a>
        </div>
        <div id="mensaje">
            <?php
            session_start();
            if (isset($_SESSION['mensaje'])) {
                echo '<p>' . $_SESSION['mensaje'] . '</p>';
                unset($_SESSION['mensaje']); // Borra el mensaje después de mostrarlo
            }
            ?>
        </div>
    </main>
</body>
</html>
