<?php

// Establecemos la colección
$collection=$bd->peliculas;

// Se comprueba que la colección está vacía
if(coleccionVacia()==true){ // Si la colección está vacía

	// Se establece a la variable la API key
	$apikey='25uu9nryfxqb5b65umh6mkkr';

	// Se obtiene un json de las películas que están en cartelera y próximamente desde la API de RottenTomatoes
	$cartelera='http://api.rottentomatoes.com/api/public/v1.0/lists/movies/box_office.json?apikey=' . $apikey;
	$proximamente='http://api.rottentomatoes.com/api/public/v1.0/lists/movies/upcoming.json?apikey=' . $apikey;

	// Se declaran las variables vacías a nivel local
	$resultCart="";
	$resultProx="";

	// Si la URL de cartelera es null, mostrará un error por pantalla
	if(obtenerUrl($cartelera) === NULL){

		die('Error parsing json');

	}
	else{ // Si la URL es un json

		// Se guardan los resultados obtenidos desde la API
		$resultCart=obtenerUrl($cartelera);

		// Si la URL de proximamente es null, mostrará un error por pantalla
		if(obtenerUrl($proximamente) === NULL){

			die('Error parsing json');

		}
		else{

			// Se guardan los resultados obtenidos desde la API
			$resultProx=obtenerUrl($proximamente);

		}

	}

	// Se accede al array bidimensional
	$cart=$resultCart->movies;


	// Se recorre el array para insertan en nuestra BD de mongolab
	foreach ($cart as $movie){

		$collection->insert($movie);

	}

	// Se accede al array bidimensional de próximamente
	$prox=$resultProx->movies;

	// Se recorre el array para insertan en nuestra BD de mongolab
	foreach ($prox as $movie){

		$collection->insert($movie);

	}

	// Se incluye el fichero inicio.php para mostrar el resultado
	include 'views/inicio.php';

} // Cierre de comprobación de la colección vacía o no.

else{ // Si la colección peliculas no está vacía, redirige a la página principal	

	include 'views/inicio.php';

}

/*
* obtenerUrl. Para obtener los resultados de la URL. 
* parans --> $url. Se obtiene la url del mismo fichero.
* return --> Array. Devuelve los datos de la url.
*/
function obtenerUrl($url){

	// Inicia sesión cURL
	$curl=curl_init($url);

	// Configura una opción para una transferencia cURL	
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	// Establece una sesión cURL
	$data=curl_exec($curl);

	// Cierra una sesión cURL
	curl_close($curl);

	// Decodifica un string de JSON
	$search_results=json_decode($data);

	// Devuelve un array de resultados
	return $search_results;

} // Cierre de la función obtenerUrl


/*
* coleccionVacia. Comprueba si la colección establecida está vacía o no.
* return --> Booleano. Devuelve un true si la colección está vacía.
*/
function coleccionVacia(){

	// Variable global
	global $collection;

	// Se establece el valor false a la variable local
	$vacio=false;

	// Se obtienen todas las películas de la bd
	$peliculas=$collection->find();
	
	// Si el array es null
	if(iterator_to_array($peliculas)==NULL){

		// Se establece a la variable local el valor true
		return $vacio=true;

	}	

	// Devuelve un booleano
	return $vacio;

} // Cierre de la función coleccionVacia

?>