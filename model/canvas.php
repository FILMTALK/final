<?php

// Se mantiene la conexión bd
include_once("../config/database.php");
// Se establece la colección
$collection=$bd->usuarios;
// Se obtienen los datos desde POST Ajax
$image = $_POST['imgSrc'];
$id_usuario = $_POST['id_usuario'];
$usuario = $_POST['nombreUsuario'];

// Lee la imagen y convierte a base64
$imageData = base64_encode(file_get_contents($image));
// Formato de SRC:  data:{mime};base64,{data};
//{mime}--> El formato de la imagen, ej.:image/jpeg
$src = 'data: '.mime_content_type($image).';base64,'.$imageData;

// Se consulta el nombre del usuario en la colección
$users=$collection->findOne(array('usuario' => $usuario));

// Se recorre el registro del usuario
foreach ($users as $document) {

	// Se actualiza la imagen del usuario
	$collection->update(array('usuario' => $usuario), array('$set'=> array('foto' =>  $src)));

}

// Se obtienen los datos del usuario mediante el id
$datos=$collection->findOne(array('_id' => $id_usuario));

// Devuelve el objeto JSON
echo json_encode($datos);

?>