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

    <!-- ventana emergente -->  
    <script>
          function registrarUsuario() {

      // Obtén los valores de los campos
      var nombre = document.getElementById("names").value;
      var apellido = document.getElementById("apellido").value;
      var email = document.getElementById("email").value;
      var telefono = document.getElementById("phone").value;
      var tutor = document.getElementsByName("tutor")[0].value;
      var fechaNacimiento = document.getElementsByName("fecha_nacimiento")[0].value;
      var telefonoTutor = document.getElementById("phone_tutor").value;
      var opciones = document.getElementById("opciones").value;


      // Expresión regular para validar un número de teléfono de México
      var telefonoRegExp = /^(\+52|0052|52)?[1-9]\d{9}$/;

      // Expresión regular para validar una dirección de correo electrónico
      var emailRegExp = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

      // Validación de la fecha de nacimiento (no mayor a 1970)
      var fechaNacimientoDate = new Date(fechaNacimiento);
      var fechaLimite = new Date("1970-01-01");

      if (fechaNacimientoDate > fechaLimite) {
          alert("La fecha de nacimiento no puede ser mayor a 1970.");
          return;
      }
      if (fechaNacimientoDate > fechaActual) {
          alert("La fecha de nacimiento no puede ser en el futuro.");
          return;
      }

      // Validaciones
      // Validación del nombre
        if (!/^[a-zA-Z\s]+$/.test(nombre)) {
            alert("El nombre no debe contener números ni caracteres especiales.");
            return;
        }
      if (nombre.trim() === "") {
          alert("Por favor, ingresa tu nombre.");
          window.location.href = "registro.php"; // URL de la página de registro
          return;
      }

      if (apellido.trim() === "") {
          alert("Por favor, ingresa tus apellidos.");
          window.location.href = "registro.php";
          return;
      }

      if (!emailRegExp.test(email)) {
          alert("Por favor, ingresa una dirección de correo electrónico válida.");
          window.location.href = "registro.php";
          return;
      }

      if (!/^\d+$/.test(telefono)) {
          alert("El número de teléfono debe contener solo dígitos.");
          return;
      }

      if (!telefonoRegExp.test(telefono)) {
          alert("Por favor, ingresa un número de teléfono válido (formato mexicano).");
          window.location.href = "registro.php";
          return;
      }

      if (tutor.trim() === "") {
          alert("Por favor, ingresa el nombre completo del tutor.");
          window.location.href = "registro.php";
          return;
      }
      
    var xhr = new XMLHttpRequest();

xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.mensaje === "Usuario registrado correctamente.") {
                // Registro exitoso
                registroExitoso = true;
            } else {
                // Error en el registro
                registroExitoso = false;
            }

            alert(response.mensaje); // Muestra la ventana emergente
            window.location.href = response.urlPerfil; // Redirige al perfil
        } else {
            // Error en la solicitud AJAX
            registroExitoso = false;
            alert("Error en la solicitud AJAX.");
        }
    }
              };

              xhr.open("POST", "registrar.php", true);
              xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                  // Crear la cadena de consulta con todos los datos
    var data = "nombre=" + nombre + "&apellido=" + apellido + "&email=" + email + "&telefono=" + telefono + "&fecha_nacimiento=" + fechaNacimiento + "&tutor=" + tutor + "&telefono_tutor=" + telefonoTutor + "&opciones=" + opciones;

// Enviar la solicitud
xhr.send(data);

    }
    // Si todas las validaciones pasan, puedes enviar el formulario o hacer lo que necesites.
     // document.forms[0].submit();

      // Para restablecer el formulario después de un envío exitoso
      // document.forms[0].reset();
  



      </script>

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
              
              <h2 class="m-0 text-primary"><img src="images/logo_ce.png" class="logo" alt="Main Logo" align="absmiddle" style="width: 70px;">
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
                    <a class="nav-link" href="contact.html">Registro</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="login.php">Inicio de sesión</a>
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

    <!-- contact section -->
    <section class="hero-section2">
    <div class="overlay2">
    <h3 class="text-white display-3 mb-4" style="text-align: center;" >Regístrate</h3>
</div>
</section>
  

      <div class="container layout_padding2-top contact_section layout_padding">
        <div class="row ">
          <div class="col-md-7">
            <div class="d-md-flex">
              <div class="col-md-10 p-0 container2">
                <!-- Imagen a la izquierda del formulario -->
                <img src="images/centro3.jpg" alt="Tu Imagen" class="img-fluid h-100" style="max-width: 97%;">
              </div>
              
            
                  <form action="registrar.php" class="container2 col-12" method="post" > <!-- jjj -->
                    <div class="row">
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
                          <input type="text" class="message-box" placeholder="DOMICILIO" name="domicilio" value="" required>
                        </div>
                        <div class="col-md-12">
                          Fecha de nacimiento<input type="date" name="fecha_nacimiento" placeholder="FECHA DE NACIMIENTO"  required>
                        </div>
                        <div class="col-md-12">
                          <input type="text" class="message-box" name="tutor" placeholder="NOMBRE COMPLETO DEL TUTOR Y/O RESPONSABLE"  required>
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
                          <button value="Registrar" onclick="registrarUsuario()">
                            REGISTRAR
                          </button>
                        </div>
                </div>
              </form>
  
          </div>
        </div>
      </div>
      

      </div>
  

  <!-- end contact section -->
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
                <a href="contact.php">
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

</html>