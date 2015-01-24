<?php

include_once("../config/database.php");


// Se obtienen los datos mediante ajax
$valorEstrella=$_POST['clickEstrella'];
$pelicula_id=$_POST['pelicula_id'];
$usuario_id=$_POST['usuario_id'];
$exit;

// Se establece la colección
$collection=$bd->valoracion;

// Se crea un array para guardar los datos en la bd
$existe=$collection->find(array('id_pelicula' => $pelicula_id,'id_usuario' => $usuario_id));

if($existe->count() == 0){
	$document = array( 

		"id_pelicula" => $pelicula_id, 
		"valoracion" => $valorEstrella,
		"id_usuario" => $usuario_id

	);

	// Se inserta el documento en la colección llamado votacion
	$collection->insert($document);

	// Devuelve el objeto JSON
	$exit=true;
}
else{
	$exit=false;
}
echo json_encode(array('exito'=>$exit));

?>