<!DOCTYPE html>
<html>
<head>
    <title>Perfil del Usuario</title>
</head>
<body>
    <h2>Perfil del Usuario</h2>
    <?php
    session_start();
    
    if (!isset($_SESSION['telefono'])) {
        // Si el usuario no ha iniciado sesión, redirigirlo al inicio de sesión
        header("Location: login.php");
        exit();
    }
    
    // Obtener los datos del usuario desde la base de datos
    include_once('conex.php'); // Asegúrate de incluir tu archivo de conexión a la base de datos

    $conexion = conn();
    $telefono = $_SESSION['telefono'];
    $sql = "SELECT * FROM paciente WHERE Teléfono = '$telefono'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        $usuario = mysqli_fetch_assoc($resultado);
    } else {
        echo "Error al obtener los datos del usuario desde la base de datos.";
    }

    mysqli_close($conexion);
    ?>
    <p><strong>Nombre:</strong> <?php echo $usuario['Nombre'] . ' ' . $usuario['Apellidos']; ?></p>
    <p><strong>Correo:</strong> <?php echo $usuario['Correo']; ?></p>
    <p><strong>Teléfono:</strong> <?php echo $usuario['Teléfono']; ?></p>
    <p><strong>Domicilio:</strong> <?php echo $usuario['Domicilio']; ?></p>
    <p><strong>Fecha de Nacimiento:</strong> <?php echo $usuario['Fecha_nac']; ?></p>
    <p><strong>Tutor/Responsable:</strong> <?php echo $usuario['Pers_contact']; ?></p>
    <p><strong>Teléfono del Tutor:</strong> <?php echo $usuario['tel_contac']; ?></p>
    <p><strong>Taller Elegido:</strong> <?php echo $usuario['nombre_ta']; ?></p>

    <!-- Formulario para editar el campo 'nombre_ta' -->
    <form method="POST" action="editar_perfil.php">
        <label for="nombre_ta">Taller Elegido:</label>
        <input type="text" name="nombre_ta" value="<?php echo $usuario['nombre_ta']; ?>" required>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
