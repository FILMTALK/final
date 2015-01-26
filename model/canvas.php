<?php

	include_once("../config/database.php");

	// Establecemos la colección
	$collection=$bd->usuarios;

	$image = $_POST['imgSrc'];
	$id_usuario = $_POST['id_usuario'];
	$usuario = $_POST['nombreUsuario'];

	// Read image path, convert to base64 encoding
	$imageData = base64_encode(file_get_contents($image));
	// Format the image SRC:  data:{mime};base64,{data};
	//{mime}--> El formato de la imagen, ej.:image/jpeg
	$src = 'data: '.mime_content_type($image).';base64,'.$imageData;

	//$users=$collection->findOne(array('_id' => $id_usuario));
	$users=$collection->findOne(array('usuario' => $usuario));

	// Se recorre el array
	foreach ($users as $document) {

		$collection->update(array('usuario' => $usuario), array('$set'=> array('foto' =>  $src)));

	}
	
	$datos=$collection->findOne(array('_id' => $id_usuario));

	// Devuelve el objeto JSON
	echo json_encode($datos);
	
?>