<?php
include_once('conex.php');
$mensaje = null;

// Conexión a la base de datos
$conexion = conn();

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtén el ID del paciente (ajusta esto según tu aplicación)
$id_paciente = $_POST['id_paciente'];

// Procesar la selección de talleres
if (isset($_POST['talleres']) && is_array($_POST['talleres'])) {
    foreach ($_POST['talleres'] as $id_taller) {

        // Obtener el nombre del taller a partir del $id_taller
            $query = "SELECT nombre_ta FROM taller WHERE id_taller = $id_taller";
            $result = $conexion->query($query);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $nombre_taller = $row['nombre_ta'];;

        $sql = "INSERT INTO pertaller (tallerPa, nombre_ta, id_taller, id_paciente) 
                VALUES (NULL, '$nombre_taller', $id_taller, $id_paciente)";

        if ($conexion->query($sql) === FALSE) {
            $mensaje = "Error al agregar el taller: " . $conexion->error;
        }
    } else {
        // El ID del taller no se encontró en la base de datos, maneja esto según tus necesidades
        $nombre_taller = "Taller no encontrado";
    }

    }
}


// Procesar la deselección de talleres
if (isset($_POST['deseleccionar']) && is_array($_POST['deseleccionar'])) {
    foreach ($_POST['deseleccionar'] as $id_taller) {

         // Obtener el nombre del taller a partir del $id_taller
         $query = "SELECT nombre_ta FROM taller WHERE id_taller = $id_taller";
         $result = $conexion->query($query);

         if ($result->num_rows > 0) {
             $row = $result->fetch_assoc();
             $nombre_taller = $row['nombre_ta'];;

        $sql = "DELETE FROM pertaller WHERE id_taller = $id_taller AND id_paciente = $id_paciente";

        if ($conexion->query($sql) === FALSE) {
            $mensaje = "Error al eliminar el taller: " . $conexion->error;
        }
        } else {
            // El ID del taller no se encontró en la base de datos, maneja esto según tus necesidades
            $nombre_taller = "Taller no encontrado";
        }

    }
}


// Añadir más lógica según tus necesidades, como redirecciones o mensajes de confirmación.
// ...

$conexion->close();

// Redirigir al usuario según el resultado
if ($mensaje) {
    // En caso de error, redirige a una página de error o muestra un mensaje al usuario
    header("Location: error.php?mensaje=" . urlencode($mensaje));
    exit();
} else {
    // En caso de éxito, redirige al perfil o muestra un mensaje de éxito al usuario
    header("Location: perfil2.php");
    exit();
}
?>


