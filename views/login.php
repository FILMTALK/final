<html>

	<head>
		<meta charset="utf8" />
		<title> Login </title>
	</head>

	<body>

		<h2> Login </h2>

		<!-- Formulario de logueo -->
		<form method="post" action="../model/login.php" name="loginForm">

			<!-- Email -->
		    <label for="email" > Email </label>
		    <input id="email" type="email" name="email" required />

		    <!-- Contraseña -->
		    <label for="password" > Contraseña </label>
		    <input id="password" type="password" name="password" required />

		    <!-- Botón para loguearse -->
		    <input type="submit" name="login" value="Login" />

		</form> <!-- Cierre del formulario de logueo -->

	</body>

</html>