<html>

	<head>
		<meta charset="utf8" />
		<title> Registro </title>
	</head>

	<body>

		<h2> Registro </h2>

		<!-- Formulario de registro -->
		<form method="post" action="../model/registro.php" name="registroForm">

			<!-- Email -->
		    <label for="email" > Email </label>
		    <input id="email" type="email" name="email" required />

		    <!-- Usuario -->
		    <label for="username" >Usuario </label>
		    <input id="username" type="text" name="username" required />

		    <!-- Contraseña -->
		    <label for="password" > Contraseña </label>
		    <input id="password" type="password" name="password" required />

		    <!-- Repetir contraseña -->
		    <label for="password" > Repetir contraseña </label>
		    <input id="password2" type="password" name="password2" required />

		    <!-- Botón para registrarse -->
		    <input type="submit" name="registro" value="Registrarse" />

		</form> <!-- Cierre del formulario de registro -->

	</body>

</html>