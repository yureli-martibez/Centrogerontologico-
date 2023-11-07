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

  <body class="pagina-con-fondo">
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
                  <li class="nav-item">
                    <a class="nav-link" href="about.html"> ¿Quiénes somos? </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="service.html"> Servicios y talleres </a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="includes/logout2.php">Cerrar sesión</a>
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

    <!-- Bienvenida medico -->
    <section class="hero-section3">
    <div class="overlay3">
    <h3 class="text-white display-3 mb-4" style="text-align: center;" >Bienvenido Médico</h3>
</div>
</section>

 <!-- end bienvenida -->
<br>
 <div class="custom_heading-container">
          <h3 class=" ">
            Registro de citas
          </h3>
        </div>
   
 <div class="container layout_padding2-top contact_section layout_padding">
        <div class="row ">
          <div class="col-md-7">
            <div class="d-md-flex">
            
                    <form action="registrar.php" class="container2 col-12" method="post"> 
                    
                      <div class="row">
                      <div class="error-message" id="error-message" style="color: red;"></div>
                          <div class="col-md-6">
                            <input type="text" placeholder="NOMBRE" name="nombre" id="names" value="" required>
            
                          </div>
                          <div class="col-md-6">
                            <input type="text" placeholder="APELLIDOS" name="apellido" id="apellido" value="" required>
                           
                          </div>
                          <div class="col-md-6">
                            <input type="email" placeholder="CORREO" name="email" id="email" value="" required>
                          
                          </div>
                          <div class="col-md-6">
                            <input type="text" placeholder="TELÉFONO" name="telefono" id="phone" value="" required>
                            
                          </div>
                          <div class="col-md-12">
                            <input type="text" class="message-box" placeholder="DOMICILIO" name="domicilio" id="domicilio" value="" required>
                          </div>
                          <div class="col-md-12">
                            Fecha de nacimiento<input type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="FECHA DE NACIMIENTO"  required>
                           
                          </div>
                          <div class="col-md-12">
                            <input type="text" class="message-box" name="tutor" placeholder="NOMBRE COMPLETO DEL TUTOR Y/O RESPONSABLE" id="tutor" required>
                            
                          </div>
                          <div class="col-md-6">
                            <input type="text" placeholder="TELÉFONO TUTOR" name="telefono_tutor" id="phone_tutor" required>
                           
                          </div>
                          <div class="col-md-6">
                            <select name="opciones" id="" >
                              <option value="" disabled selected>TALLER A ELEGIR</option>
                              <option value="Papel Nono">Papel Nono</option>
                              <option value="Danza">Danza</option>
                              <option value="Cocina">Cocina</option>
                            </select>
                            

                          </div>
                          <div class="contact_section button col-md-12 d-flex justify-content-center">
                            <button value="Registrar"  onclick="validarFormulario()">
                              REGISTRAR
                            </button>
                            
                          </div>
                          

                       
                  </div>
                </form>
               
  
          </div>
        </div>
      </div> 
      

      </div>


</body>
</hmtl>

 