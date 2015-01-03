<?php

// Se importa database.php para realizar consultas a la base de datos
include_once("../config/database.php");

// Se importan las funciones para comprobar u obtener datos
include_once("../funciones/funciones.php");

// Se comprueba si el anadir está definida
if(isset($_POST['anadir'])){
	// Si los campos están vacíos
	if($_POST['nombre']==NULL or $_POST['descripcion']==NULL or $_POST['duracion']==NULL or $_POST['reparto']==NULL or $_POST['calificacion']==NULL){

		// Se muestra un mensaje por pantalla
		echo "Los campos estan vacios";
		exit;
	}
	else{ // Si los campos no están vacíos

		// Establecemos la colección
		$collection=$bd->peliculas;

		// Se comprueba si la pelicula existe
		if(peliculaExiste($_POST['nombre'])==true){

			// Se muestra un mensaje por pantalla
			echo "La pelicula ya esta dada de alta";
			exit;
		}
		else{ 

			try {

				// Se crea un array para obtener los datos del formulario para guarda como un documento
				$document = array( 

					"title" => $_POST['nombre'], 
					"synopsis" => $_POST['descripcion'],
					"duracion" => ($_POST['duracion']),
					"reparto" => ($_POST['reparto']),
					"calificacion" => ($_POST['calificacion'])

		    	);

				// Se inserta el documento en la colección
				$collection->insert($document);

				// Redirecciona al perfil del usuario
				header("location: ../views/anadir.html");

			}
			catch (MongoCursorException $e) {

				// Se visualiza si los datos no son adecuados
				echo 'Error al insertar datos!';

			} // Cierre de la excepción

		} // Cierre del else porque la pelicula existe

	} // Cierre del else porque los campos no están vacíos

} // Cierre del if --> variable registro

?>