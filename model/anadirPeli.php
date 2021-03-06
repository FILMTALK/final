<?php
// Se requiere las sesiones para los mensajes flash
if( !session_id() ) session_start();
// Requiere la clase de mensajes y se instancia el objeto de tipo Messages
require_once('../controller/class.messages.php');
$msg = new Messages();
// Se importa database.php para realizar consultas a la base de datos
include_once("../config/database.php");
// Se importan las funciones para comprobar u obtener datos
include_once("../funciones/peliculas.php");

// Se comprueba si el anadir está definida
if(isset($_POST['anadir'])){

	// Si los campos están vacíos
	if($_POST['nombre']==NULL or $_POST['descripcion']==NULL or $_POST['duracion']==NULL or $_POST['reparto']==NULL){

		// Se establece el mensaje a mostrar
		$msg->add('e', 'ERROR: Los campos estan vac&iacute;os');
		// Redirecciona al anadirPeli
		header("location: ../views/anadirPeli.php");
		// Imprime un mensaje y termina el script actual
		exit();

	}
	else{ // Si los campos no están vacíos

		// Se establece la colección peliculas
		$collection=$bd->peliculas;

		// Se comprueba si la pelicula existe
		if(peliculaExiste($_POST['nombre'])==true){

			// Se establece el mensaje a mostrar
			$msg->add('e', 'ERROR: El pel&iacute; ya existe');
			// Redirecciona al anadirPeli
			header("location: ../views/anadirPeli.php");
			// Imprime un mensaje y termina el script actual
			exit();

		}
		else{ 			

			try {
				$tipoPeli='';
				if($_POST['tipoPeli']=='boxOffice'){
					$tipoPeli='boxOffice';
				} else {
					$tipoPeli='upcoming';
				}
				
				// Se crea un array para guardar los datos del formulario
				$document = array( 

					"title" => $_POST['nombre'], 
					"poster" => '',
					"year" => ($_POST['year']),
					$tipoPeli => ($_POST['tipoPeli']),
					"runtime" => ($_POST['duracion']),
					"trailer" => '',
					"synopsis" => $_POST['descripcion'],
					"cast" => ($_POST['reparto'])

		    	);

				// Se inserta el documento en la colección peliculas
				$collection->insert($document);
				// Se crea el mensaje
				$msg->add('s', '¡FABULOSO! Pel&iacute;cula añadida');
				// Redirecciona al añadir pefil del administrador
				header("location: ../views/anadirPeli.php");

			}
			catch (MongoCursorException $e) {

				// Mensaje de error a mostrar
				$msg->add('e', 'ERROR: Al insertar los datos');
				// Redirecciona al anadirPeli
				header("location: ../views/anadirPeli.php");
				// Imprime un mensaje y termina el script actual
				exit();

			} // Cierre de la excepción

		} // Cierre del else porque la pelicula existe

	} // Cierre del else porque los campos no están vacíos

} // Cierre del if 

?>
