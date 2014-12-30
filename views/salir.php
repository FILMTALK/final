<?php

// Se importa database.php para mantener la conexión
include_once("../config/database.php");

session_start();

//destruir sesion
session_destroy();

// Libera las variables de sesión
/*unset($_SESSION['email']);
unset($_SESSION['usuario']);
unset($_SESSION['password']);*/

// Redirecciona a la página principal
header("location: /index.php");

?>