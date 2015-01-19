<?php

include_once("../config/database.php");

// Se obtienen los datos mediante ajax
$valorEstrella=$_POST['clickEstrella'];
$pelicula_id=$_POST['pelicula_id'];

// Se establece la colección
$collection=$bd->valoracion;

// Se crea un array para guardar los datos en la bd
$document = array( 

	"id_pelicula" => $pelicula_id, 
	"valoracion" => $valorEstrella

);

// Se inserta el documento en la colección llamado votacion
$collection->insert($document);

// Se realiza una consulta con el id_pelicula
$datos=$collection->find(array('id_pelicula' => $pelicula_id));

// Devuelve el objeto JSON
echo json_encode(iterator_to_array($datos));

?>