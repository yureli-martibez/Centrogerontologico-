<?php
include_once('conex.php');
 $nombre =$_POST['nombre'];
 $apellido= $_POST['apellido'];
 $correo = $_POST['email'];
 $telefono= $_POST['telefono'];


    $conexion=conn();
    $sql="INSERT INTO usuarios (id_usuario, Nombre, Apellido, Correo, Telefono) values (NULL, '$nombre','$apellido', '$correo', '$telefono')";
    $resul= mysqli_query($conexion, $sql) or trigger_error("Query Failed! SQL-Error:" .mysqli_error($conexion), E_USER_ERROR) ;
      
    //include_once 'login.php';
    echo"USUARIO REGISTRADO";
 ?>