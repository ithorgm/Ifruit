<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Empleado | Ifruit</title>
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
                <h1>Agregar Empleado</h1>
            </div>
        </div>
        <div id="tabla_P">
            <form action="registrar_empleado.php" method="post">
                <table class="form-table">
                    <tr>
                        <td>
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe el nombre del empleado" required>
                        </td>
                        <td>
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Escribe el apellido del empleado" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                        </td>
                        <td>
                            <label for="direccion_id">Dirección ID</label>
                            <input type="text" class="form-control" id="direccion_id" name="direccion_id" placeholder="Ingresa la dirección ID" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresa el teléfono" required>
                        </td>
                        <td>
                            <label for="correo_electronico">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" placeholder="Ingresa el correo electrónico" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="salario">Salario</label>
                            <input type="text" class="form-control" id="salario" name="salario" placeholder="Ingresa el salario" required>
                        </td>
                        <td>
                            <label for="fecha_contratacion">Fecha de Contratación</label>
                            <input type="date" class="form-control" id="fecha_contratacion" name="fecha_contratacion" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="cargo">Cargo</label>
                            <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Ingresa el cargo" required>
                        </td>
                        <td>
                            <label for="departamento">Departamento</label>
                            <input type="text" class="form-control" id="departamento" name="departamento" placeholder="Ingresa el departamento" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="supervisor_id">Supervisor ID</label>
                            <input type="text" class="form-control" id="supervisor_id" name="supervisor_id" placeholder="Ingresa el supervisor ID">
                        </td>
                        <td>
                            <label for="role_id">Role ID</label>
                            <input type="text" class="form-control" id="role_id" name="role_id" placeholder="Ingresa el role ID" required>
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
            <a href="empleado.php">
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
