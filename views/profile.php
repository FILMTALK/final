<html>
<!--
<?php

/* Se importa database.php para mantener la conexión
include_once("../config/database.php");

Se importan para utilizar las sesiones
include_once("../model/registro.php");
include_once("../model/login.php");

$cookie_name="usuario";
$cookie_value=$usuario;
setcookie($cookie_name, $cookie_value, time()+3600);  Se expira en 1h.*/

?> -->

	<head>
		<meta charset="utf8" />
		<title> Perfil </title>
	</head>

	<body>

		<h2> Perfil </h2>

		<?php

			//print(" Hola, <b>" . $_COOKIE[$cookie_name] . "<b/>");

			// Se importa database.php para mantener la conexión
			include_once("../config/database.php");

			// Se importan para utilizar las sesiones
			include_once("../model/registro.php");
			include_once("../model/login.php");


			// Si está logueado muestra los datos y el link para salir
			print("Hola, <b>".$_SESSION["usuario"]."</b>! <br>\n");
			print("Tu contraseña es: <b>".$_SESSION["password"]."</b><br>\n");
			print("Tu email es: <b>".$_SESSION["email"]."</b><br>\n");
			print("<a href=\"salir.php"."\">Salir</a>");

		?>

	</body>

</html>