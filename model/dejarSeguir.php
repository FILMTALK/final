<?php

// Se importa database.php para realizar consultas a la base de datos
include_once("../config/database.php");

$exit;

$titulo=$_POST['titulo'];
$id_usuario=$_POST['id_usuario'];


try{
	$collection=$bd->sigue_peli;

	$eliminar=$collection->remove(array( 'titulo' => "$titulo", 'id_usuario' => "$id_usuario"));

	// Devuelve el objeto JSON
	$exit=true;
}
catch(MongoConnectionException $e){
	$exit=false;
}
echo json_encode(array('exito'=>$exit));

?>
