<?php
include_once('conex.php');

// Asegúrate de tener una forma de identificar al usuario, como un ID único.
$usuario_id = 1; // Reemplaza esto con el valor real o método de identificación del usuario.

$conexion = conn();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Aquí maneja la actualización de los datos del perfil
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellidos'];
    $correo = $_POST['email'];
    $telefono = $_POST['telefono'];
    $domicilio = $_POST['domicilio'];
    $fecha_nac = $_POST['fecha_nacimiento'];
    $tutor = $_POST['tutor'];
    $telefono_tutor = $_POST['telefono_tutor'];
    $opcionSeleccionada = $_POST['opciones'];

    $sql = "UPDATE paciente SET 
            Nombre = '$nombre',
            Apellidos = '$apellido',
            Correo = '$correo',
            Teléfono = '$telefono',
            Domicilio = '$domicilio',
            Fecha_nac = '$fecha_nac',
            Pers_contact = '$tutor',
            tel_contact = '$telefono_tutor',
            nombre_ta = '$opcionSeleccionada'
            WHERE id_paciente = $usuario_id";

    if (mysqli_query($conexion, $sql)) {
        echo "Datos actualizados correctamente.";
    } else {
        die("Error al actualizar los datos del usuario: " . mysqli_error($conexion));
    }
}

// Consulta para obtener los datos del usuario
$sql = "SELECT * FROM paciente WHERE id_paciente = $usuario_id";
$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    $usuario = mysqli_fetch_assoc($resultado);
} else {
    die("Error al obtener los datos del usuario: " . mysqli_error($conexion));
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Perfil</title>
</head>
<body>
    <h1>Editar Perfil</h1>
    <form method="post" action="editar_perfil.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $usuario['Nombre']; ?>" required><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" value="<?php echo $usuario['Apellidos']; ?>" required><br>

        <label for="email">Correo:</label>
        <input type="email" id="email" name="email" value="<?php echo $usuario['Correo']; ?>" required><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo $usuario['Teléfono']; ?>" required><br>

        <label for="domicilio">Domicilio:</label>
        <input type="text" id="domicilio" name="domicilio" value="<?php echo $usuario['Domicilio']; ?>" required><br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $usuario['Fecha_nac']; ?>" required><br>

        <label for="tutor">Tutor/Responsable:</label>
        <input type="text" id="tutor" name="tutor" value="<?php echo $usuario['Pers_contact']; ?>" required><br>

        <label for="telefono_tutor">Teléfono del Tutor:</label>
        <input type="text" id="telefono_tutor" name="telefono_tutor" value="<?php echo $usuario['tel_contact']; ?>" required><br>

        <label for="opciones">Taller Elegido:</label>
        <select id="opciones" name="opciones">
            <option value="Papel Nono" <?php if ($usuario['nombre_ta'] == 'Papel Nono') echo 'selected'; ?>>Papel Nono</option>
            <option value="Danza" <?php if ($usuario['nombre_ta'] == 'Danza') echo 'selected'; ?>>Danza</option>
            <option value="Cocina" <?php if ($usuario['nombre_ta'] == 'Cocina') echo 'selected'; ?>>Cocina</option>
        </select><br>

        <button type="submit">Actualizar Perfil</button>
    </form>
</body>
</html>
