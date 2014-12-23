<?php

// Se importa database.php para realizar consultas a la base de datos
include_once("../config/database.php");

// Se importan las funciones para comprobar u obtener datos
include_once("../funciones/funciones.php");

// Iniciar una nueva sesión
session_start();

// Se comprueba si el login está definida
if(isset($_POST['login'])){
	
	// Si los campos username o password están vacíos
	if($_POST['email']==NULL or $_POST['password']==NULL){

		// Se muestra un mensaje por pantalla
		echo "Los campos estan vacios";

		// Redirecciona al formulario de login
		//header("location: ../views/login.php");

		// Imprime un mensaje y termina el script actual 
		exit;

	}
	else{ // Si los campos no están vacíos

		// Se comprueba si el usuario existe en la base de datos, si no está, muestra un mensaje.
		if(usuarioExiste($_POST['email'])==false){

			// Se visualiza un mensaje por pantalla
			echo "Los datos no son validos";

			// Redirecciona al formulario de login
			//header("location: ../views/login.php");

			// Imprime un mensaje y termina el script actual 
			exit;

		}
		else{ // Si el usuario existe en la bd

			// Se comprueba si la contraseña coincide
			if(comprobarPassword($_POST['email'],md5($_POST['password']))==true){ //Si la contraseña coindice

				// Se obtiene el usuario del usuario desde la base
				$usuario=obtenerUsuario($_POST['email']);

				// Se establece la variable de sesión del usuario obtenienda desde la bd
				$_SESSION['usuario']=$usuario;


				// Se establece la variable de sesión de la contraseña obtenienda desde el formulario
				$_SESSION['password']=md5($_POST['password']);


				// Se establece la variable de sesión del email obteniendo desde el formulario
				$_SESSION['email']=$_POST['email'];

				$email=$_POST['email'];
				$password=md5($_POST['password']);

				// Redirecciona al perfil del usuario
				header("location: ../views/profile.php");

			}
			else{ // Si la contraseña no coincide

				// Muestra un mensaje por pantalla
				echo "La clave no es correcta";

				// Redirecciona al formulario de login
				//header("location: ../views/login.php");

			} // Cierre del else porque la contraseña no coincide

		} // Cierre del else porque el usuario existe en la bd
		
	} // Cierre del else si los campos no están vacíos

} // Cierre del if --> variable login

?>