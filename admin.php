<?php
//seguriadad de la sesión 
session_start();
error_reporting(0);
$varsesion=$_SESSION['usuario'];

if($varsesion==null || $varsesion=''){
  //echo("no tienes acceso");
  header("location:personal.php");
  die();
}

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
              
              <h2 class="m-0 text-primary"><img src="images/logo_ce.png" class="logo" alt="Main Logo" align="absmiddle" >
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
                <a href="contact.html">
                  Registro
                </a>
              </li>
              <li>
                <a href="#">
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