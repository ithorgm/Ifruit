<?php
session_start();
include("conexion.php");

if (
    isset($_POST['nombre']) &&
    isset($_POST['apellido']) &&
    isset($_POST['fecha_nacimiento']) &&
    isset($_POST['direccion_id']) &&
    isset($_POST['telefono']) &&
    isset($_POST['correo_electronico']) &&
    isset($_POST['salario']) &&
    isset($_POST['fecha_contratacion']) &&
    isset($_POST['cargo']) &&
    isset($_POST['departamento'])
) {
    $nombre = mysqli_real_escape_string($conex, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($conex, $_POST['apellido']);
    $fecha_nacimiento = mysqli_real_escape_string($conex, $_POST['fecha_nacimiento']);
    $direccion_id = mysqli_real_escape_string($conex, $_POST['direccion_id']);
    $telefono = mysqli_real_escape_string($conex, $_POST['telefono']);
    $correo_electronico = mysqli_real_escape_string($conex, $_POST['correo_electronico']);
    $salario = mysqli_real_escape_string($conex, $_POST['salario']);
    $fecha_contratacion = mysqli_real_escape_string($conex, $_POST['fecha_contratacion']);
    $cargo = mysqli_real_escape_string($conex, $_POST['cargo']);
    $departamento = mysqli_real_escape_string($conex, $_POST['departamento']);

    $consulta = "INSERT INTO empleado (nombre, apellido, fecha_nacimiento, direccion_id, telefono, correo_electronico, salario, fecha_contratacion, cargo, departamento) VALUES ('$nombre', '$apellido', '$fecha_nacimiento', '$direccion_id', '$telefono', '$correo_electronico', '$salario', '$fecha_contratacion', '$cargo', '$departamento')";
    $resultado = mysqli_query($conex, $consulta);

    if ($resultado) {
        $_SESSION['mensaje'] = 'El empleado se ha registrado exitosamente';
    } else {
        $_SESSION['mensaje'] = 'Ocurrió un error al registrar el empleado';
    }
} else {
    $_SESSION['mensaje'] = 'Llena todos los campos';
}

header('Location: Agregar_empleado.php');
exit();
?>
