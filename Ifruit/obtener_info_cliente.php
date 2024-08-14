<?php
// obtener_info_cliente.php

$conex = mysqli_connect("localhost", "garciamaya_Kevin", "Kraitos0812", "garciamaya_ifuit");

if (!$conex) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

$clienteId = $_GET['id'];

$consulta_cliente_info = "SELECT rfc, CONCAT(calle, ', ', ciudad, ', ', estado, ', ', codigo_postal) AS direccion
                          FROM cliente c
                          JOIN direccion d ON c.direccion_id = d.id
                          WHERE c.id = $clienteId";

$resultado_cliente_info = mysqli_query($conex, $consulta_cliente_info);

if (!$resultado_cliente_info) {
    die("Error en la consulta de información del cliente: " . mysqli_error($conex));
}

$clienteInfo = mysqli_fetch_assoc($resultado_cliente_info);

echo json_encode($clienteInfo);
?>
