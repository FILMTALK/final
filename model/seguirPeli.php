<?php
// Se importa para la conexión bd
include_once("../config/database.php");

// Se obtienen los datos mediante ajax
$titulo=$_POST['titulo'];
$usuario_id=$_POST['usuario_id'];
// Variable para booleano para devolver un JSON
$exit;

// Se establece la colección
$collection=$bd->sigue_peli;

// Se crea un array para guardar los datos en la bd
$existe=$collection->find(array('titulo' => $titulo,'id_usuario' => $usuario_id));

// Si el array contiene datos
if($existe->count() == 0){

	// Se crea el array para guardar en la bd
	$document = array( 

		"titulo" => $titulo,
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