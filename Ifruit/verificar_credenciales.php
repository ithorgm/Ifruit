<?php
    // Establecer la conexión a la base de datos
    $conex = mysqli_connect("localhost", "garciamaya_Kevin", "Kraitos0812", "garciamaya_ifuit");

    // Verificar si la conexión fue exitosa
    if (!$conex) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

    // Recuperar datos del formulario
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Consultar la base de datos para verificar las credenciales
    $query = "SELECT * FROM usuario WHERE nombre_usuario = '$usuario' AND contrasena = '$contrasena'";
    $result = mysqli_query($conex, $query);

    // Verificar si se encontró un usuario con las credenciales proporcionadas
    if (mysqli_num_rows($result) > 0) {
        // Usuario autenticado, redirigir a inmen.html
        header("Location: Inmen.html");
        exit();
    } else {
        // Credenciales incorrectas, redirigir de nuevo a la página de inicio de sesión
        header("Location: index.html");
        exit();
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conex);
?>
