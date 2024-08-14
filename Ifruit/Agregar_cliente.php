<?php
    $conex = mysqli_connect("localhost", "garciamaya_Kevin", "Kraitos0812", "garciamaya_ifuit");

    // Verificar la conexión a la base de datos
    if (!$conex) {
        die('Error de conexión: ' . mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cliente | Ifruit</title>
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
    <main role="main">
        <div class="table-container">
            <div class="table-header">
                <h1>Agregar Cliente</h1>
            </div>
        </div>
        <div id="tabla_P">
            <form action="registrar_cliente.php" method="post">
                <table class="form-table">
                    <tr>
                        <td>
                            <label for="nombre">Nombre del Cliente</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe el nombre del cliente" required>
                        </td>
                        <td>
                            <label for="direccion_id">Dirección ID</label>
                            <input type="text" class="form-control" id="direccion_id" name="direccion_id" placeholder="Ingresa el ID de la dirección" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="correo_electronico">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" placeholder="Ingresa el correo electrónico" required>
                        </td>
                        <td>
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresa el número de teléfono" required>
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
            <a href="cliente.php">
                <button class="regresar">Atrás</button>
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
