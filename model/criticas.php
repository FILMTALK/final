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
include_once("../funciones/funciones.php");

// Iniciar una nueva sesión o reanudar una sesión
session_start();

// Se comprueba si el comentario está definido
if(isset($_POST['enviarCritica'])){
	// Si el textarea de criticas está vacio
	if($_POST['criti']==NULL){

		// Mensaje de error a mostrar
		$msg->add('e', 'ERROR: No has introducido el comentario');

		// Redirecciona al perfil de la película
		header('Location: ../views/perfil-peli.php');

		// Imprime un mensaje y termina el script actual
		exit();
		
	}
	else{ // Si el textarea no está vacío

		try {

			$idUsu=$_SESSION['id_usuario'];

			// Se crea un array para obtener los datos del formulario para guarda como un documento
			$document = array( 

				"id_usuario" => $idUsu, 
				"id_pelicula" => "549013dce4b00f4300732ae4",
				"comentario" => $_POST['criti']

	    	);

			// Se inserta el documento en la colección llamado users
			$collection=$bd->criticas;
			$collection->insert($document);


			// Redirecciona al perfil del usuario
			header("location: ../views/perfil-peli.php");

		}
		catch (MongoCursorException $e) {

			// Mensaje de error a mostrar
			$msg->add('e', 'ERROR: Al insertar datos!');

			// Redirecciona al perfil de la película
			header('Location: ../views/perfil-peli.php');

			// Imprime un mensaje y termina el script actual
			exit();

		}// Cierre de la excepción

	} 

} // Cierre del if --> variable registro

?>