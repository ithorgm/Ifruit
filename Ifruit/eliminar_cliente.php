<?php
// Verificar si se proporciona un ID válido a través de la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_cliente = $_GET['id'];

    // Conectarse a la base de datos
    $conex = mysqli_connect("localhost", "garciamaya_Kevin", "Kraitos0812", "garciamaya_ifuit");

    if (!$conex) {
        die('Error de conexión: ' . mysqli_connect_error());
    }

    // Eliminar el registro de la base de datos
    $sql = "DELETE FROM cliente WHERE id = $id_cliente";
    if (mysqli_query($conex, $sql)) {
        // La eliminación fue exitosa, redirigir a cliente.php
        header("Location: cliente.php");
    } else {
        echo "Error al eliminar el cliente: " . mysqli_error($conex);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conex);
} else {
    echo "ID de cliente no válido.";
}
?>
