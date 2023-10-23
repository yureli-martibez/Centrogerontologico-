<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_paciente'])) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión u otra página de acceso
    header("Location: login.php"); // Reemplaza 'login.php' con la página de inicio de sesión real
    exit();
}

include_once('conex.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $usuario_id = intval($_GET['id']); // Obtén el ID del usuario desde la URL
    $conexion = conn();

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
} else {
    // Manejo de error o redirección en caso de que no se proporcione un ID válido en la URL
    header("Location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Centro gerontológico</title>
 <!-- slider stylesheet -->
 <link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Roboto:400,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

    
    <!--Icono de la pestaña-->
    <link rel="icon" type="img/ico" href="images/logo_ce.png">
  </head>

  <body>
    <div class="hero_area">
      <!-- header section strats -->
      <header class="header_section">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.html">
              
              <h2 class="m-0 text-primary"><img src="images/logo_ce.png" class="logo" alt="Main Logo" align="absmiddle" style="width: 70px;" >
                <span>Centro Gerontológico</h2></span>
            </a>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
              data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
                <ul class="navbar-nav  ">
                  <li class="nav-item ">
                    <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about.html"> ¿Quiénes somos? </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="service.html"> Servicios y talleres </a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="includes/logout.php">Cerrar sesión</a>
                  </li>
                
                </ul>
              </div>
            </div>
            <!--<form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
              <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
            </form> -->
          </nav>
        </div>
      </header>
      <!-- end header section -->
    </div>

</head>
<body>
<section class="about_section layout_padding">
  <div class="container2">
    <div class="custom_heading-container">
      <h3 class="profile_heading">Perfil del Usuario</h3>
    </div>
    <div class="user_profile">
      <p class="profile_info"><strong>Nombre:</strong> <?php echo $usuario['Nombre'] . ' ' . $usuario['Apellidos']; ?></p>
      <p class="profile_info"><strong>Correo:</strong> <?php echo $usuario['Correo']; ?></p>
      <p class="profile_info"><strong>Teléfono:</strong> <?php echo $usuario['Teléfono']; ?></p>
      <p class="profile_info"><strong>Domicilio:</strong> <?php echo $usuario['Domicilio']; ?></p>
      <p class="profile_info"><strong>Fecha de Nacimiento:</strong> <?php echo $usuario['Fecha_nac']; ?></p>
      <p class="profile_info"><strong>Tutor/Responsable:</strong> <?php echo $usuario['Pers_contact']; ?></p>
      <p class="profile_info"><strong>Teléfono del Tutor:</strong> <?php echo $usuario['tel_contac']; ?></p>
      <p class="profile_info"><strong>Taller Elegido:</strong> <?php echo $usuario['nombre_ta']; ?></p>
    </div>
  </div>
</section>


    <!-- Puedes añadir más campos según tus necesidades -->

    <a href="editar_perfil.php">Editar Perfil</a> <!-- Enlazar a una página de edición si lo deseas -->
</body>
</html>
