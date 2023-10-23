<?php
//$mensaje = null;
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

// Define un mapeo de opciones a ID de talleres
$mapeoTalleres = array(
    "Papel Nono" => 1,
    "Danza" => 2,
    "Cocina" => 3
);

// Obtén el ID del taller seleccionado
$id_taller = $mapeoTalleres[$opcionSeleccionada];

// Consulta el nombre del taller basado en el ID
$query = "SELECT nombre_ta FROM taller WHERE id_taller = $id_taller";
$result = $conexion->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombre_taller = $row['nombre_ta'];

    $sql1 = "INSERT INTO paciente (id_paciente, Nombre, Apellidos, Correo, Teléfono, Domicilio, Fecha_nac, Pers_contact, tel_contac) 
    values (NULL, '$nombre','$apellido', '$correo', '$telefono', '$domicilio', '$fecha_nac', '$tutor', '$telefono_tutor')";
    
    if ($conexion->query($sql1) === TRUE) {
        $id_paciente = $conexion->insert_id; // Obtener el ID recién insertado
    
        // Insertar el ID del paciente y el ID del taller en la tabla pertaller
        $sql2 = "INSERT INTO pertaller (tallerPa, nombre_ta, id_taller, id_paciente ) 
                 values (NULL, '$nombre_taller', $id_taller, $id_paciente )";

        if ($conexion->query($sql2) === FALSE) {
            $mensaje = "Error al registrar el taller: " . $conexion->error;
            $urlPerfil = "registro.php"; // Página de inicio de sesión o la que prefieras
        } else {
            header("Location: login.php");
            exit;
        }
    } else {
        $mensaje = "Error al registrar el usuario: " . $conexion->error;
        $urlPerfil = "registro.php"; // Página de inicio de sesión o la que prefieras
    }
} else {
    $mensaje = "No se encontró el taller seleccionado en la base de datos.";
    $urlPerfil = "registro.php"; // Página de inicio de sesión o la que prefieras
}

$conexion->close();

$response = array('mensaje' => $mensaje, 'urlPerfil' => $urlPerfil);
echo json_encode($response);
?>
