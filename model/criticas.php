<?php
// Se requiere las sesiones para los mensajes flash
if( !session_id() ) session_start();
// Requiere la clase de mensajes y se instancia el objeto de tipo Messages
require_once('../controller/class.messages.php');
$msg = new Messages();
// Se importa database.php para realizar consultas a la base de datos
include_once("../config/database.php");
// Se importan las funciones para obtener datos
include_once("../funciones/peliculas.php");

// Se obtienen los datos mediante ajax
$id_usuario=$_POST['id_usuario'];
$id_pelicula=$_POST['id_pelicula'];
$comentario=$_POST['contenido'];

// Establecemos la colección
$collection=$bd->peliculas;
// Se obtienen los datos de la película
$datos=obtenerDatosPelicula($id_pelicula);
// Variable local
$titulo;

foreach ($datos as $campo => $valor) {

	if($campo=="title"){
		// Se guarda el título
		$titulo=$valor;

	}
}

// Se comprueba el valor de la cricia y si es null
if(isset($comentario) and $comentario==NULL){

	// Mensaje de error a mostrar
	$msg->add('e', 'ERROR: No has introducido el comentario');
	// Redirecciona al perfil de la película
	header('Location: ../views/perfil-peli.php?peli=' . $titulo);
	// Imprime un mensaje y termina el script actual
	exit();
	
}
else{ // Si el comentario no está vacío

	try {

		// Se crea un array para obtener los datos del formulario para guarda como un documento
		$document = array( 

			"id_usuario" => $id_usuario, 
			"id_pelicula" => $id_pelicula,
			"comentario" => $comentario

    	);

		// Se inserta el documento en la colección llamado criticas
		$collection=$bd->criticas;
		$collection->insert($document);
		// Se realiza una consulta para obtener todas las críticas con el id_pelicula
		$criti=$collection->find(array('id_pelicula' => $id_pelicula));
		// Devuelve el objeto JSON bidimensional
		echo json_encode(iterator_to_array($criti));

	}
	catch (MongoCursorException $e) {

		// Mensaje de error a mostrar
		$msg->add('e', 'ERROR: Al insertar datos!');
		// Redirecciona al perfil de la película
		header('Location: ../views/perfil-peli.php?peli=$titulo');
		// Imprime un mensaje y termina el script actual
		exit();

	}// Cierre de la excepción
}

?>