<?php
function conn(){
$host = "localhost";
$usuario = "root";
$password = "";
$bd = "geron";

$conexion = mysqli_connect ($host, $usuario, $password, $bd);
return $conexion;
}
?>