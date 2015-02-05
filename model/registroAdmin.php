<?php
// Se requiere las sesiones para los mensajes flash
if( !session_id() ) session_start();
// Se requiere las sesiones para los mensajes flash
require_once('../controller/class.messages.php');
$msg = new Messages();
// Se importa database.php para realizar consultas a la base de datos
include_once("../config/database.php");
// Se importan las funciones para comprobar u obtener datos
include_once("../funciones/usuarios.php");

// Se comprueba si el registro está definida
if(isset($_POST['registro'])){

	// Si los campos email, username, password o password2 están vacíos
	if($_POST['email']==NULL or $_POST['username']==NULL or $_POST['password']==NULL or $_POST['password2']==NULL){

		// Mensaje de error a mostrar
		$msg->add('e', 'ERROR: Los campos estan vac&iacute;os');
		// Redirecciona a la página de registro
		header('Location: ../views/anadirUser.php');
		// Imprime un mensaje y termina el script actual
		exit();
		
	}
	else{ // Si el mail está mal
		$email=$_POST['email'];
		// Se comprueba la estrucutra del email
		if(!preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/",$email)){

			// Mensaje de error a mostrar
			$msg->add('e', 'ERROR: El email no tiene formato correcto, debe de ser ejemplo@ejemplo.com');
			// Redirecciona a la página de añadir usuario
			header('Location: ../views/anadirUser.php');
			// Imprime un mensaje y termina el script actual
			exit();

		}else{

			// Se comprueba si las contraseñas coinciden
			if(!($_POST["password"]==$_POST["password2"])){

				// Mensaje de error a mostrar
				$msg->add('e', 'ERROR: Las claves no coinciden');
				// Redirecciona a la página de añadir usuario
				header('Location: ../views/anadirUser.php');
				// Imprime un mensaje y termina el script actual
				exit();

			}
			else{ // Si las contraseñas coinciden

				$password=$_POST["password"];
				// Obtiene el tamaño de la contraseña
				$tamPass = strlen($password);
				// Si la contraseña es menor que 8 o mayor que 15 caractres.
				if($tamPass<8 || $tamPass>15){
					// Mensaje de error a mostrar
					$msg->add('e', 'ERROR: La contraseña tiene que tener 8 caracteres como mínimo o 15 como máximo');
					// Redirecciona a la página de añadir usuario
					header('Location: ../views/anadirUser.php');

					// Imprime un mensaje y termina el script actual
					exit();

				}
				else{

					// Se comprueba que el usuario existe en la bd.
					if(usuarioExiste($_POST['email'])==true){ //Si el usuario existe

						// Mensaje de error a mostrar
						$msg->add('e', 'ERROR: El usuario ya existe');
						// Redirecciona a la página de añadir usuario
						header('Location: ../views/anadirUser.php');
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
							// Se crea el mensaje con el contenido exitoso
							$msg->add('s', '¡FABULOSO! Usuario añadido');
							// Redirecciona a la página de añadir usuario
							header("location: ../views/anadirUser.php");

						}
						catch (MongoCursorException $e) { // Lanza la excepción

							// Mensaje de error a mostrar
							$msg->add('e', 'ERROR: Al insertar los datos');
							// Redirecciona a la página de registro
							header('Location: ../views/anadirUser.php');
							// Imprime un mensaje y termina el script actual
							exit();

						} // Cierre de la excepción

					} // Cierre del else si el usuario no existe

				} // Cierre del else si la contraseña no tiene 8 caracteres como mínimo

			} // Cierre del else porque las contraseñas coinciden

		} //Cierre del else para compobar si el mail está correcto.
		
	} // Cierre del else porque los campos no están vacíos

} // Cierre del if --> variable registro

?>