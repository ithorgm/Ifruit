<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | Ifruit</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <div id="contenedor">
        <div id="contenedorcentrado">
            <div id="login">
                <form id="loginform" action="verificar_credenciales.php" method="post">
                    <label for="usuario">Usuario</label>
                    <input id="usuario" type="text" name="usuario" placeholder="Usuario" required>
                    
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" name="contrasena" placeholder="Contraseña" required>

                    <button type="submit" title="Ingresar">Ingresar</button>
                </form>
            </div>
            <div id="derecho">
                <div class="titulo">
                    <img src="imagenes/APPLE.png" alt="" style="max-width: 60px;">
                    <img class="uno" src="imagenes/texto.png" alt="" style="max-width: 100px; margin-right: 20px;">
                    <br><br>
                    Bienvenido
                </div>
                <hr>
                <div class="pie-form">
                    <a href="#">¿Perdiste tu contraseña?</a>
                    <a href="#">¿No tienes cuenta? Solicitar Cuenta</a>
                    <hr>
                    <a href="index.html">« Volver</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
