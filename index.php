<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario de contacto</title>

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/font-awesome.css">

    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
<div class="container">
      <div class="navbar">
        <div style="font-size: 35px; font-family: Serif; color:black;">
          <img src="img/logo.png" class="logo" alt="Main Logo" align="absmiddle" >&emsp; Centro Gerontologico </div>
      
      </div>
    <section class="form_wrap">

        <section class="cantact_info">
            <section class="info_title">
                <span class="fa fa-user-circle"></span>
                <h2>INFORMACION<br>DE CONTACTO</h2>
            </section>
            <section class="info_items">
                <p><span class="fa fa-envelope"></span> info.contact@gmail.com</p>
                <p><span class="fa fa-mobile"></span> +1(585) 902-8665</p>
            </section>
        </section>

        <form action="registrar.php" class="form_contact" method="post">
            <h2>Envia un mensaje</h2>
            <div class="user_info">
                <label for="names">Nombre *</label>
                <input type="text" name="nombre" id="names" value="" required>

                <label for="names">Apellido *</label>
                <input type="text" name="apellido" id="apellido" value="" required>

                <label for="email">Correo electronico *</label>
                <input type="text" name="email" id="email" value="" required>

                <label for="phone">Telefono / Celular</label>
                <input type="text" name="telefono" id="phone" value="" required>

                <input type="submit"  class="buttons" name="Registrar" value="Registrarse"  id="btnSend">
            </div>
        </form>

    </section>

</body>
</html>
