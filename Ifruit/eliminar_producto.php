<?php
    // Verificar si se proporciona un ID válido a través de la URL
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        // Conectarse a la base de datos
        $conex = mysqli_connect("localhost", "root", "", "ifuit");

        if (!$conex) {
            die('Error de conexión: ' . mysqli_connect_error());
        }

        // Eliminar el registro de la base de datos
        $sql = "DELETE FROM producto WHERE id = $id";
        if (mysqli_query($conex, $sql)) {
            // La eliminación fue exitosa, redirigir a producto.php
            header("Location: producto.php");
        } else {
            echo "Error al eliminar el producto: " . mysqli_error($conex);
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conex);
    } else {
        echo "ID de producto no válido.";
    }
?>
