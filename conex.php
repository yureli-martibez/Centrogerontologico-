<?php
function conn(){
$host = "localhost";
$usuario = "root";
$password = "";
$bd = "geron";

$conexion = mysqli_connect($host, $usuario, $password, $bd);

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    return $conexion; // Devolver la conexión
}
?>