<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}



define('INACTIVITY_TIMEOUT', 60); // 60 segundos = 1 minuto

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > INACTIVITY_TIMEOUT) {
    session_unset();
    session_destroy();
} else {
    $_SESSION['last_activity'] = time();
}

// Resto del código de la página

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("Location: login.php");
    exit();
}

// Incluir la conexión a la base de datos
$db_host = 'localhost';
$db_name = 'geron';
$db_user = 'root';
$db_password = '';
// Obtener los datos del usuario de la base de datos
try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obtener los datos del usuario
    $telefono = $_SESSION['user'];
    $stmt = $db->prepare("SELECT * FROM paciente WHERE Teléfono = :telefono");
    $stmt->bindParam(':telefono', $telefono);
    $stmt->execute();

    // Obtén los datos del usuario
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Consulta para obtener el nombre del taller desde la tabla pertaller
    $stmt2 = $db->prepare("SELECT nombre_ta FROM pertaller WHERE id_paciente = :id_paciente");
    $stmt2->bindParam(':id_paciente', $usuario['id_paciente']);
    $stmt2->execute();
    $nombre_talleres = $stmt2->fetchAll(PDO::FETCH_COLUMN);

   // var_dump($nombre_talleres);

    } catch (PDOException $e) {
    // Manejo de errores de la base de datos
    echo "Error de conexión: " . $e->getMessage();
    }

// Cerrar la conexión a la base de datos
$db = null;
?>

<!DOCTYPE html>
<html>
<head>
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
            <a class="navbar-brand" href="index.php">
              
              <h2 class="m-0 text-primary"><img src="images/logo_ce.png" class="logo" alt="Main Logo" align="absmiddle" style="width: 60px;">
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
                    <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item ">
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


<body>
  <br>
<section class="client_section layout_padding-bottom ">
<div class="client_container container2">

    <div class="user-icon">
        <img src="images/user-icon.png" alt="Usuario">
    </div>
      <div class="custom_heading-container" >
            <h3 style="text-align: center;" >
            <?php echo $usuario['Nombre'] . ' ' . $usuario['Apellidos']; ?>
            </h3>
          </div>
          <br>
    <input type="hidden" name="id_paciente" value="<?php echo $usuario['id_paciente']; ?>">

    
    <p><strong>Correo:</strong> <?php echo $usuario['Correo']; ?></p>
    <p><strong>Teléfono:</strong> <?php echo $usuario['Teléfono']; ?></p>
    <p><strong>Domicilio:</strong> <?php echo $usuario['Domicilio']; ?></p>
    <p><strong>Fecha de Nacimiento:</strong> <?php echo $usuario['Fecha_nac']; ?></p>
    <p><strong>Tutor/Responsable:</strong> <?php echo $usuario['Pers_contact']; ?></p>
    <p><strong>Teléfono del Tutor:</strong> <?php echo $usuario['tel_contac']; ?></p>
    <p><strong>Taller Elegido:</strong> <?php echo implode(', ', $nombre_talleres); ?></p>
   
   
    
    <!-- formulario cambiar taller -->
    <div class="custom_heading-container">
        <h4 class=" "style="text-align: center;">
          <strong>Cambiar taller</strong>
        </h4>
      </div>

                  <form action="procesar_seleccion.php"   method="POST">
                  <input type="hidden" name="id_paciente" value="<?php echo $usuario['id_paciente']; ?>">
                  <label for="talleres" class="custom-control custom-checkbox">Agregar taller:</label>
                  
                  <input type="checkbox" name="talleres[]" value="1" > Papel Nono
                  <input type="checkbox" name="talleres[]" value="2" > Danza
                  <input type="checkbox" name="talleres[]" value="3" > Cocina
                  

                  
              <!-- Agrega checkboxes para deselección -->
                  <label for="deseleccionar" class="custom-control custom-checkbox">Eliminar talleres:</label>
                  <input type="checkbox" name="deseleccionar[]" value="1"> Papel Nono
                  <input type="checkbox" name="deseleccionar[]" value="2"> Danza
                  <input type="checkbox" name="deseleccionar[]" value="3"> Cocina

                  <div class="contact_section ">
                  <div class="col-md-12 d-flex justify-content-center">
                    <button type="submit" value="Guardar selección"> Guardar selección
                    </button>
                  </div>
             </div>
            </div>
          </div>
        </div>
  </div>
</form>

      

</section>
<!-- info section -->
<section class="info_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info-logo">
            <h2>
              Centro Gerontológico
            </h2>
            <p>
              El centro gerontológico integral es un espacio donde se brinda atención primaria a las y los adultos.
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info-nav">
            <h4>
              Navegación
            </h4>
            <ul>
              <li>
                <a href="index.html">
                  Inicio
                </a>
              </li>
              <li>
                <a href="about.html">
                  ¿Quiénes somos?
                </a>
              </li>
              <li>
                <a href="service.html">
                  Servicios y talleres
                </a>
              </li>
              <li>
                <a href="registro.php">
                  Registro
                </a>
              </li>
              <li>
                <a href="login.php">
                  Inicio de sesión 
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info-contact">
            <h4>
              Información de contacto
            </h4>
            <div class="location">
              <h6>
                Dirección:
              </h6>
              <a href="">
                <img src="images/location.png" alt="">
                <span>
                  Carretera México- Laredo s/n, esq, con av. Insurgentes, instalaciones del antiguo patrimonio, Ixmiquilpan, Hgo., Ixmiquilpan, México
                </span>
              </a>
            </div>
            <div class="call">
              <h6>
                Número telefónico :
              </h6>
              <a href="">
                <img src="images/telephone.png" alt="">
                <span>
                  ( +759 728 8171)
                </span>
              </a>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="discover">
            <h4>
              Redes sociales
            </h4>
            <div class="social-box">
              <a href="https://www.facebook.com/CGIIxmiquilpan/?locale=es_LA">
                <img src="images/facebook.png" alt="">
              </a>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- end info_section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      Copyright &copy; 2023 Derechos reservados
   
    </p>
  </section>
  <!-- footer section -->

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>


	
    

