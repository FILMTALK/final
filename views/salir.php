<?php

// Se importa database.php para mantener la conexión
include_once("../config/database.php");

session_start();

//destruir sesion
session_destroy();

// Libera las variables de sesión
/*unset($_SESSION['id_usuario']);
unset($_SESSION['nombreUsuario']);
*/

//establecer la fecha de expiración a una hora atrás
setcookie ("Usuario", "", time()-3600);

// Redirecciona a la página principal
header("location: /index.php");

?>