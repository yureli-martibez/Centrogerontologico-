<?php
include_once('conex.php');
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['email'];
$telefono = $_POST['telefono'];
$domicilio = $_POST['domicilio'];
$fecha_nac = $_POST['fecha_nacimiento'];
$tutor = $_POST['tutor'];
$telefono_tutor = $_POST['telefono_tutor'];
$opcionSeleccionada = $_POST['opciones'];

$conexion = conn();

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$sql1 = "INSERT INTO paciente (id_paciente, Nombre, Apellidos, Correo, Teléfono, Domicilio, Fecha_nac, Pers_contact, tel_contac, nombre_ta) 
values (NULL, '$nombre','$apellido', '$correo', '$telefono', '$domicilio', '$fecha_nac', '$tutor', '$telefono_tutor', '$opcionSeleccionada')";

if ($conexion->query($sql1) === TRUE) {
    $id_paciente = $conexion->insert_id; // Obtener el ID recién insertado
    session_start();
    $_SESSION['id_paciente'] = $id_paciente;
    $urlPerfil = "perfil.php?id=" . $id_paciente;
    header("Location: " . $urlPerfil);
 
} else {
    $mensaje = "Error al registrar el usuario: " . $conexion->error;
    $urlPerfil = "contact.php"; // Página de inicio o la que prefieras
}

$conexion->close();

$response = array('mensaje' => $mensaje, 'urlPerfil' => $urlPerfil);
echo json_encode($response);

?>