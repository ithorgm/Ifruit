<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conex = mysqli_connect("localhost", "garciamaya_Kevin", "Kraitos0812", "garciamaya_ifuit");
    
    if (!$conex) {
        die('Error de conexión: ' . mysqli_connect_error());
    }

    $id_empleado = $_POST['id_empleado'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion_id = $_POST['direccion_id'];
    $telefono = $_POST['telefono'];
    $correo_electronico = $_POST['correo_electronico'];
    $salario = $_POST['salario'];
    $fecha_contratacion = $_POST['fecha_contratacion'];
    $cargo = $_POST['cargo'];
    $departamento = $_POST['departamento'];
    $supervisor_id = $_POST['supervisor_id'];

    $sql = "UPDATE empleado 
            SET nombre = '$nombre', apellido = '$apellido', fecha_nacimiento = '$fecha_nacimiento', 
                direccion_id = '$direccion_id', telefono = '$telefono', correo_electronico = '$correo_electronico', 
                salario = '$salario', fecha_contratacion = '$fecha_contratacion', cargo = '$cargo', 
                departamento = '$departamento', supervisor_id = '$supervisor_id' 
            WHERE id = $id_empleado";
    
    if (mysqli_query($conex, $sql)) {
        header('Location: empleado.php');
    } else {
        echo 'Error al actualizar el empleado: ' . mysqli_error($conex);
    }

    mysqli_close($conex);
}
?>
