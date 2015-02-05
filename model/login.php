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

// Se comprueba si el login está definida
if(isset($_POST['login'])){
	
	// Si los campos username o password están vacíos
	if($_POST['email']==NULL or $_POST['password']==NULL){

		// Mensaje de error a mostrar
		$msg->add('e', 'ERROR: Los campos estan vacios');

		// Redirecciona a la página de login
		header('Location: ../views/login.php');

		// Imprime un mensaje y termina el script actual
		exit();

	}
	else{ // Si los campos no están vacíos

		$email=$_POST['email'];
		if(!preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/",$email)){
			// Mensaje de error a mostrar
			$msg->add('e', 'ERROR: El email no tiene formato correcto, debe de ser ejemplo@ejemplo.com');


			// Redirecciona a la página de login
			header('Location: ../views/login.php');

			// Imprime un mensaje y termina el script actual
			exit();
		}else{
			// Se comprueba si el usuario existe en la base de datos, si no está, muestra un mensaje.
			if(usuarioExiste($_POST['email'])==false){

				// Mensaje de error a mostrar
				$msg->add('e', 'ERROR: Los datos no son validos');

				// Redirecciona a la página de login
				header('Location: ../views/login.php');

				// Imprime un mensaje y termina el script actual
				exit();

			}
			else{ // Si el usuario existe en la bd

				// Se comprueba si la contraseña coincide
				if(comprobarPassword($_POST['email'],md5($_POST['password']))==true){ //Si la contraseña coincide

					if($_POST['email']=="admin@admin.com"){

						// Se obtiene el id del usuario desde la bd
						$id_usuario=obtenerIdUsuario($_POST['email']);

						// Si la variable de sesión id no está definido
						if(!isset($_SESSION['id_usuario'])){

							//Se establece la variable de sesión del usuario, que será el id.
							$_SESSION['id_usuario']=$id_usuario;
							
						}

						// Si la variable de sesión nombreUsuario no está definido
						if(!isset($_SESSION['nombreUsuario'])){

							//Se establece la variable de sesión del usuario, que será el nombre de usuario.
							$_SESSION['nombreUsuario']="admin";
							
						}

						// Si la variable de sesión email no está definido
						if(!isset($_SESSION['email'])){

							//Se establece la variable de sesión del usuario, que será el nombre de usuario.
							$_SESSION['email']="admin@admin.com";
							
						}

						// Redirecciona al perfil admin
						header("location: ../views/admin.php");

					}
					else{ // Si no es administrador

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

						// Redirecciona ala pagina anterior
						header("location:".$_SERVER['HTTP_REFERER']);

					} // Cierre del else si no es admin
				
				}
				else{ // Si la contraseña no coincide

					// Mensaje de error a mostrar
					$msg->add('e', 'ERROR: La clave no es correcta');

					// Redirecciona a la página de login
					header('Location: ../views/login.php');

					// Imprime un mensaje y termina el script actual
					exit();

				} // Cierre del else porque la contraseña no coincide

			} // Cierre del else porque el usuario existe en la bd
		}//cierre del else si el mail está mal
		
	} // Cierre del else si los campos no están vacíos

} // Cierre del if --> variable login

?>