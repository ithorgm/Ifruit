<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario | Ifruit</title>
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
                <h1>Agregar Usuario</h1>
            </div>
        </div>
        <div id="tabla_U">
            <?php
            // Conexión a la base de datos
            $host = "localhost";
            $usuario = "garciamaya_Kevin";
            $contrasena = "Kraitos0812";
            $nombre_base_datos = "garciamaya_ifuit";

            $conex = mysqli_connect($host, $usuario, $contrasena, $nombre_base_datos);

            // Verificar la conexión
            if (!$conex) {
                die("La conexión a la base de datos falló: " . mysqli_connect_error());
            }
            ?>
            <form action="registrar_usuario.php" method="post">
                <table class="form-table">
                    <tr>
                        <td>
                            <label for="nombre_usuario">Nombre de Usuario</label>
                            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Escribe el nombre de usuario" required>
                        </td>
                        <td>
                            <label for="contrasena">Contraseña</label>
                            <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Escribe la contraseña" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="empleado_id">Empleado</label>
                            <select class="form-control" id="empleado_id" name="empleado_id" required>
                                <?php
                                // Consulta para obtener la lista de empleados
                                $consulta_empleados = "SELECT id, CONCAT(nombre, ' ', apellido) AS nombre_completo FROM empleado";
                                $resultado_empleados = mysqli_query($conex, $consulta_empleados);

                                // Iterar sobre los resultados y generar opciones del select
                                while ($empleado = mysqli_fetch_assoc($resultado_empleados)) {
                                    echo '<option value="' . $empleado['id'] . '">' . $empleado['nombre_completo'] . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <label for="role_id">Rol</label>
                            <select class="form-control" id="role_id" name="role_id" required>
                                <?php
                                // Consulta para obtener la lista de roles
                                $consulta_roles = "SELECT id, nombre_de_rol FROM roles";
                                $resultado_roles = mysqli_query($conex, $consulta_roles);

                                // Iterar sobre los resultados y generar opciones del select
                                while ($rol = mysqli_fetch_assoc($resultado_roles)) {
                                    echo '<option value="' . $rol['id'] . '">' . $rol['nombre_de_rol'] . '</option>';
                                }
                                ?>
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
            <a href="usuario.php">
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
