<?php

// Se importa database.php para realizar consultas a la base de datos
include_once("../config/database.php");

function obtenerIdPelicula($titulo){

	// Variable global
	global $collection;

	// Variable local 
	$id_pelicula=''; // Se establece el valor vacío de String

	// Se realiza una consulta para obtener la id de la película
	$peliculas=$collection->findOne(array('title' => $titulo));

	// Recorremos los datos de esa película en concreto
	foreach($peliculas as $campos => $datos){

		// Filtramos el campo para obtener el dato
		if($campos=='_id'){

			// Se guarda el id único de la película en una variable local
			$id_pelicula=$datos;

		} // Cierre del if

	} // Cierre del bucle foreach

	// Devuelve la variable local en String
	return $id_pelicula;	


}  //Cierre de la función obtenerIdPelicula


function obtenerDatosPelicula($id_pelicula){

	// Variable global
	global $collection;

	// Se realiza una consulta para obtener los datos de la película a mostrar
	$peliculas=$collection->findOne(array('_id' => $id_pelicula));	

	// Devuelve el array de película
	return $peliculas;

}

function peliculaExiste($nombre){

	// Variable global
	global $collection;

	// Variable local 
	$existe=true; // Se establece el valor true

	// Se realiza una consulta para obtener los dato de una pelicula 
	$peliculas=$collection->findOne(array('title' => $nombre));

	// Si la consulta devuelve NULL (no existe)
	if($peliculas==NULL){

		// Se establece la variable local con el valor false.
		$existe=false;

	}

	// Devuelve el valor booleano
	return $peliculas;	


}  //Cierre de la función peliculaExiste



function mediaValoracion($id_pelicula){

	$total=0;
	$media=0;
	$cant=0;

	// Variable global
	global $collection;

	// Se realiza una consulta para obtener la id de la película
	$valoraciones=$collection->find(array('id_pelicula' => $id_pelicula));

	foreach($valoraciones as $campos => $datos){

			foreach ($datos as $campo => $dato){

				if($campo=="valoracion"){

					$total=$total+$dato;
					$cant++;

				}

			} // Cierre del bucle foreach

	} // Cierre del bucle foreach

	if($cant!=0){

		$media=$total/$cant;

	}

	return $media;

}


function cantVotos($id_pelicula){

	$cant=0;

	// Variable global
	global $collection;

	// Se realiza una consulta para obtener la id de la película
	$valoraciones=$collection->find(array('id_pelicula' => $id_pelicula));

	foreach($valoraciones as $campos => $datos){

			foreach ($datos as $campo => $dato){

				if($campo=="valoracion"){

					$cant++;

				}

			} // Cierre del bucle foreach

	} // Cierre del bucle foreach


	return $cant;

}

?>