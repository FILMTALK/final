<?php

// Se importa database.php para realizar consultas a la base de datos
include_once("../config/database.php");

// Se importan las funciones para comprobar u obtener datos
include_once("../funciones/funciones.php");

// Iniciar una nueva sesión o reanudar una sesión
session_start();

// Se comprueba si el editNombre está definida
if(isset($_POST['editNombre'])){
	
	// Si los campos username o password están vacíos
	if($_POST['nombre']==NULL or $_POST['password']==NULL){

		// Se muestra un mensaje por pantalla
		echo "Los campos estan vacios";

		// Redirecciona al formulario de login
		//header("location: ../views/login.php");

		// Imprime un mensaje y termina el script actual 
		exit;

	}
	else{ // Si los campos no están vacíos

		// Se comprueba si la contraseña coincide
		if(verificarPassword($_SESSION["usuario"],md5($_POST['password']))==true){ //Si la contraseña coindice

			$collection = $db->usuarios;

			// now update the document
   			$collection->update(array('usuario' => $_SESSION['usuario']), array('$set'=> array('usuario' => $_POST['nombre'])));

   			//$new_data= array('$set' => array("usuario" => $_POST['nombre']));
   			//$collection->update(array('usuario' => $_SESSION['usuario']), $new_data);

   			echo "Cambio realizado";

			// Redirecciona al perfil del usuario
			header("location: ../views/profile.php");
		
		}
		else{ // Si la contraseña no coincide

			// Muestra un mensaje por pantalla
			echo "La clave no es correcta";

			// Redirecciona al formulario de login
			//header("location: ../views/login.php");

		} // Cierre del else porque la contraseña no coincide
		
	} // Cierre del else si los campos no están vacíos

} // Cierre del if --> variable login

?>