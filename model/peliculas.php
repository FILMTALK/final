<?php

// Establecemos la colección
$collection=$bd->peliculas;

if(coleccionVacia()==true){

	$apikey='25uu9nryfxqb5b65umh6mkkr';

	$cartelera='http://api.rottentomatoes.com/api/public/v1.0/lists/movies/box_office.json?apikey=' . $apikey;
	$proximamente='http://api.rottentomatoes.com/api/public/v1.0/lists/movies/upcoming.json?apikey=' . $apikey;

	$resultCart="";
	$resultProx="";

	if(obtenerUrl($cartelera) === NULL){

		die('Error parsing json');

	}
	else{

		$resultCart=obtenerUrl($cartelera);

		if(obtenerUrl($proximamente) === NULL){

			die('Error parsing json');

		}
		else{

			$resultProx=obtenerUrl($proximamente);

		}

	}

	$cart=$resultCart->movies;

	foreach ($cart as $movie){

		$collection->insert($movie);

	}

	$prox=$resultProx->movies;

	foreach ($prox as $movie){

		$collection->insert($movie);

	}

	// Incluimos el fichero index.php para mostrar el resultado
	include 'views/inicio.php';

}
else{

	// Incluimos la página principal
	include 'views/inicio.php';

}

function obtenerUrl($url){

	$curl=curl_init($url);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	$data=curl_exec($curl);

	curl_close($curl);

	$search_results=json_decode($data);

	return $search_results;

}

function coleccionVacia(){

	global $collection;

	$vacio=false;

	$peliculas=$collection->find();
	
	if(iterator_to_array($peliculas)==NULL){

		return $vacio=true;

	}	

	return $vacio;

}

?>