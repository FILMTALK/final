<?php
// Se importa para la conexión bd
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

// Si el array contiene datos
if($existe->count() == 0){

	// Se crea el array para guardar en la bd
	$document = array( 

		"id_pelicula" => $pelicula_id, 
		"valoracion" => $valorEstrella,
		"id_usuario" => $usuario_id

	);

	// Se inserta el documento en la colección llamado votacion
	$collection->insert($document);

	// Establece la variable
	$exit=true;
}
else{

	// Guarda el booleano false
	$exit=false;
}

// Devuelve el objeto JSON
echo json_encode(array('exito'=>$exit));

?>