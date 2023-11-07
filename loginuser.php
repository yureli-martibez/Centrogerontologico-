<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];

session_start();
$_SESSION['usuario']=$usuario;
    

//informacion de la base de datos 
$conexion=mysqli_connect("localhost", "root", "", "geron");

//conexion a la base de datos para validar los usuarios
$consulta="SELECT* FROM usuarios where usuario='$usuario'and contraseña='$contraseña'";
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_cargo']==1){ //panel del administrador 
    header("location:admin.php");

}else {
    if($filas['id_cargo']==2){//medico
        header("location:medico.php");
        
    }
    if($filas['id_cargo']==3){//psicologo
        header("location:psicologo.php");
    }
    if($filas['id_cargo']==4){//fisioterapeuta
        header("location:fisioterapeuta.php");
    }
  
    ?>
    <?php 
    include("personal.php");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTICACIÓN</H1>
    <?php
}

mysqli_free_result($resultado);
mysqli_close($conexion);

