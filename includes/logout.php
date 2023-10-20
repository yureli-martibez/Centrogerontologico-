<?php

// Establece la cookie para que expire en el pasado
setcookie("sesion_cookie", "", time() - 3600, "/");


session_start(); // Inicia la sesión si no está iniciada

// Elimina todas las variables de sesión
$_SESSION = array();

// Destruye la sesión
session_destroy();

// Redirige a la página de inicio de sesión o a donde desees
header("Location: ../login.php"); // Reemplaza "login.php" con la página a la que quieras redirigir
exit();
?>
