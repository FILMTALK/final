<?php

include_once("../config/database.php");

require '../library/Slim/Slim.php';
\Slim\Slim::registerAutoloader();

// Establecemos la colección
$collection=$bd->peliculas;

$app = new \Slim\Slim();

$app->get('/getPeliculas', function () {

	// Variable global
	global $collection;

	$peliculas=$collection->find();

	header('Content-Type: application/json');
	echo json_encode(iterator_to_array($peliculas));

});

$app->get('/getPelicula/:titulo', function ($titulo) {

	// Variable global
	global $collection;

	$peliculas=$collection->findOne(array('title' => $titulo));

	header('Content-Type: application/json');
	echo json_encode($peliculas);

});

$app->get('/getCartelera', function () {

	// Variable global
	global $collection;

	$cartelera=$collection->find(array("boxOffice" => "boxOffice"));

	header('Content-Type: application/json');
	echo json_encode(iterator_to_array($cartelera));

});

$app->get('/getProximamente', function () {

	// Variable global
	global $collection;

	$proximamente=$collection->find(array("upcoming" => "upcoming"));

	header('Content-Type: application/json');
	echo json_encode(iterator_to_array($proximamente));

});

$app->run();

?>