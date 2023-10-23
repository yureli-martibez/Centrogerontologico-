<?php
include_once('conex.php');
// Conexión a la base de datos (debes tener esta parte configurada)

if (isset($_POST['talleres']) && is_array($_POST['talleres'])) {
    $usuarioId = $_SESSION['usuario_id']; // Asegúrate de obtener el ID del usuario de alguna manera
    $talleresSeleccionados = $_POST['talleres'];

    // Primero, elimina todas las selecciones previas del usuario
    $query = "DELETE FROM pertaller WHERE id_paciente = $usuarioId";
    // Ejecuta la consulta SQL para eliminar selecciones anteriores

    // Luego, inserta las nuevas selecciones
    foreach ($talleresSeleccionados as $taller) {
        $query = "INSERT INTO pertaller (id_paciente, id_taller) VALUES ($usuarioId, '$taller')";
        // Ejecuta la consulta SQL para insertar las nuevas selecciones
    }
}
?>
