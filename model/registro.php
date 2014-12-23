<?php

// Se importa database.php para realizar consultas a la base de datos
include_once("../config/database.php");

// Se importan las funciones para comprobar u obtener datos
include_once("../funciones/funciones.php");

// Iniciar una nueva sesión
session_start();

// Se comprueba si el registro está definida
if(isset($_POST['registro'])){
	// Si los campos email, username, password o password2 están vacíos
	if($_POST['email']==NULL or $_POST['username']==NULL or $_POST['password']==NULL or $_POST['password2']==NULL){

		// Se muestra un mensaje por pantalla
		echo "Los campos estan vacios";

		// Redirecciona al formulario de registro
		//header("location: ../views/registro.php");

		// Imprime un mensaje y termina el script actual 
		exit;
		
	}
	else{ // Si los campos no están vacíos

		// Se comprueba si las contraseñas coinciden
		if(!($_POST["password"]==$_POST["password2"])){

			// Se muestra un mensaje por pantalla
			echo "<p> Las claves no coinciden </p>";

			// Redirecciona al formulario de registro
			//header("location: ../views/registro.php");

			// Imprime un mensaje y termina el script actual 
			exit;
		}
		else{ // Si las contraseñas coinciden

			// Se comprueba que el usuario existe en la bd.
			if(usuarioExiste($_POST['email'])==true){ //Si el usuario existe

				// Se visualiza un mensaje por pantalla
				echo "El usuario ya existe";

				// Redirecciona al formulario de registro
				//header("location: ../views/registro.php");

				// Imprime un mensaje y termina el script actual 
				exit;
			}
			else{ // Si el usuario no existe

				try {

					// Se crea un array para obtener los datos del formulario para guarda como un documento
					$document = array( 

						"email" => $_POST['email'], 
						"usuario" => $_POST['username'],
						"password" => md5($_POST['password'])

			    	);

					// Se inserta el documento en la colección llamado users
					$collection->insert($document);

					// Se obtiene el email desde la base de datos pasando el parámetro username 
					$email=obtenerEmail($_POST['username']);
					
					// Se establece la variable de sesión del usuario obteniendo desde el formulario
					$_SESSION['usuario']=$_POST['username'];

					// Se establece la variable sesión de la contraseña obtenienda desde el formulario
					$_SESSION['password']=md5($_POST['password']);

					// Se establece la variable de sesión del email obtenienda desde la bd
					$_SESSION['email']=$email;

					$usuario=$_POST['username'];
					$password=md5($_POST['password']);

					/*$cookie_name="usuario";
					$cookie_value=$usuario;
					setcookie($cookie_name, $cookie_value, time()+3600); // Se expira en 1h.*/

					// Redirecciona al perfil del usuario
					header("location: ../views/profile.php");

				}
				catch (MongoCursorException $e) {

					// Se visualiza si los datos no son adecuados
					echo 'Error al insertar datos!';

				} // Cierre de la excepción

			} // Cierre del else si el usuario no existe

		} // Cierre del else porque las contraseñas coinciden

	} // Cierre del else porque los campos no están vacíos

} // Cierre del if --> variable registro

?>