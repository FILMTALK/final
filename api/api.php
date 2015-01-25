<?php

// Se importa el fichero para realizar la conexión a la bd
include_once("../config/database.php");

// Se importa la libería Slim para crear la RESTful API
require '../library/Slim/Slim.php';
\Slim\Slim::registerAutoloader();

// Establecemos la colección
$collection=$bd->peliculas;

// Se crea el objeto Slim
$app = new \Slim\Slim();

// Se crea un ruta para obtener las películas
$app->get('/getPeliculas', function () {

	// Variable global
	global $collection;
	// Se obtiene todas las películas de BD
	$peliculas=$collection->find();
	// Le indicamos que se le pasa un objeto JSON
	header('Content-Type: application/json');
	// Desciframos el objeto JSON para mostrarlo por pantalla todos los registro de la colección "pelicula"
	echo json_encode(iterator_to_array($peliculas));
});

// Se crea un ruta para obtener una película
$app->get('/getPelicula/:titulo', function ($titulo) {

	// Variable global
	global $collection;
	// Se obtiene los datos de la película
	$peliculas=$collection->findOne(array('title' => $titulo));
	// Le indicamos que se le pasa un objeto JSON
	header('Content-Type: application/json');
	// Desciframos el objeto JSON para mostrarlo por pantalla
	echo json_encode($peliculas);

});

// Se crea un ruta para mostrar las películas en cartelera
$app->get('/getCartelera', function () {

	// Variable global
	global $collection;
	// Se obtiene todas las películas de cartelera
	$cartelera=$collection->find(array("boxOffice" => "boxOffice"));
	// Le indicamos que se le pasa un objeto JSON
	header('Content-Type: application/json');
	// Desciframos el objeto JSON para mostrarlo por pantalla
	echo json_encode(iterator_to_array($cartelera));

});

// Se crea un ruta para mostrar las películas que se van a estrenar
$app->get('/getProximamente', function () {

	// Variable global
	global $collection;
	// Se obtiene todas las película que se van a estrena
	$proximamente=$collection->find(array("upcoming" => "upcoming"));
	// Le indicamos que se le pasa un objeto JSON
	header('Content-Type: application/json');
	// Desciframos el objeto JSON para mostrarlo por pantalla
	echo json_encode(iterator_to_array($proximamente));

});

// Se ejecuta cada ruta solicitada
$app->run();

?>