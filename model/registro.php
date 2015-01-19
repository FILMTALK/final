<?php

//------------------------------------------------------------------------------
// Los mensajes flash requieren las sesiones 
//------------------------------------------------------------------------------
if( !session_id() ) session_start();

//------------------------------------------------------------------------------
// Se incluye la clase y se instancia
//------------------------------------------------------------------------------
require_once('../controller/class.messages.php');
$msg = new Messages();

// Se importa database.php para realizar consultas a la base de datos
include_once("../config/database.php");

// Se importan las funciones para comprobar u obtener datos
include_once("../funciones/usuarios.php");

// Iniciar una nueva sesión o reanudar una sesión
session_start();

// Se comprueba si el registro está definida
if(isset($_POST['registro'])){

	// Si los campos email, username, password o password2 están vacíos
	if($_POST['email']==NULL or $_POST['username']==NULL or $_POST['password']==NULL or $_POST['password2']==NULL){

		// Mensaje de error a mostrar
		$msg->add('e', 'ERROR: Los campos estan vacios');

		// Redirecciona a la página de registro
		header('Location: ../views/registro.php');

		// Imprime un mensaje y termina el script actual
		exit();
		
	}
	else{ // Si los campos no están vacíos

		// Se comprueba si las contraseñas coinciden
		if(!($_POST["password"]==$_POST["password2"])){

			// Mensaje de error a mostrar
			$msg->add('e', 'ERROR: Las claves no coinciden');

			// Redirecciona a la página de registro
			header('Location: ../views/registro.php');

			// Imprime un mensaje y termina el script actual
			exit();

		}
		else{ // Si las contraseñas coinciden

			// Se comprueba que el usuario existe en la bd.
			if(usuarioExiste($_POST['email'])==true){ //Si el usuario existe

				// Mensaje de error a mostrar
				$msg->add('e', 'ERROR: El usuario ya existe');

				// Redirecciona a la página de registro
				header('Location: ../views/registro.php');

				// Imprime un mensaje y termina el script actual
				exit();

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

					// Se obtiene el id del usuario desde la bd
					$id_usuario=obtenerIdUsuario($_POST['email']);

					// Se obtienenn los datos del usuario mediante el id
					$datosUsuario=obtenerDatosUsuario($id_usuario);

					// Variables locales
					$email;
					$nombreUsuario;

					// Recorremos los datos para saber si el email existe
					foreach($datosUsuario as $campos => $datos){

					    if($campos=='email'){
					        $email=$datos;
					    }

					    if($campos=='usuario'){
					        $nombreUsuario=$datos;
					    }

					} // Cierre del bucle foreach

					// Si la variable de sesión id no está definido
					if(!isset($_SESSION['id_usuario'])){

						//Se establece la variable de sesión del usuario, que será el id.
						$_SESSION['id_usuario']=$id_usuario;
						
					}

					// Si la variable de sesión nombreUsuario no está definido
					if(!isset($_SESSION['nombreUsuario'])){

						//Se establece la variable de sesión del usuario, que será el nombre de usuario.
						$_SESSION['nombreUsuario']=$nombreUsuario;
						
					}

					// Si la variable de sesión email no está definido
					if(!isset($_SESSION['email'])){

						//Se establece la variable de sesión del usuario, que será el nombre de usuario.
						$_SESSION['email']=$email;
						
					}

					// Redirecciona al perfil del usuario
					header("location: ../views/profile.php");

				}
				catch (MongoCursorException $e) {

					// Mensaje de error a mostrar
					$msg->add('e', 'ERROR: Al insertar los datos');

					// Redirecciona a la página de registro
					header('Location: ../views/registro.php');

					// Imprime un mensaje y termina el script actual
					exit();


				} // Cierre de la excepción

			} // Cierre del else si el usuario no existe

		} // Cierre del else porque las contraseñas coinciden

	} // Cierre del else porque los campos no están vacíos

} // Cierre del if --> variable registro

?>