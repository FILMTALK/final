<?php

// Se importa database.php para realizar consultas a la base de datos
include_once("../config/database.php");

/* @var boolean $estaLog Estado del usuario en el login
	*/
//$estaLog=false;

/*
* usuarioExiste. Para comprobar si un usuario existe en la bd.
* parans --> $email. Se obtiene del formulario.
* return --> Si el usuario existe retorna true, sino false.
*/
function usuarioExiste($email){

	// Variable global
	global $collection;

	// Variable local 
	$existe=false; // Se establece el valor false

	// Se realiza una consulta para obtener los dato de un usuario 
	$users=$collection->findOne(array('email' => $email));
	
	// Recorremos los datos para saber si el email existe
	foreach($users as $campos => $datos){

		// Si el usuario existe, devolverá un true
		if($datos==$email){

			// Se establece a la variable local el valor true
			return $existe=true;			

		} // Cierre del if		

	} // Cierre del bucle foreach

	// Devuelve el valor de la variable local
	return $existe;	

} // Cierre de la función usuarioExiste


/*
* comprobarPassword. Para comprobar si un usuario existe en la bd.
* parans --> $email. Se obtiene del formulario.
* 		 --> $password. Se obtiene password cifrado del formulario.
* return --> Si el la contraseña coincide con la de bd devolverá true, sino false.
*/
function comprobarPassword($email,$password){

	// Variable global
	global $collection;

	// Variable local 
	$correcto=false; // Se establece el valor false

	// Se realiza una consulta para obtener los datos de un usuario en concreto
	$users=$collection->findOne(array('email' => $email));

	// Recorremos los datos para saber si el email existe
	foreach($users as $campos => $datos){

		// Si la contraseña es igual
		if($datos==$password){

			// Se establece a la variable local el valor true
			return $correcto=true;

		} // Cierre del if

	} // Cierre del bucle foreach

	// Devuelve el valor de la variable local
	return $correcto;

} // Cierre de la función comprobarPassword


/*
* obtenerEmail. Se obtiene el campo email de la bd.
* parans --> $usuario. Se obtiene del formulario.
* return --> El email en String.
*/
function obtenerEmail($usuario){

	// Variable global
	global $collection;

	// Variable local 
	$email=''; // Se establece el valor vacío de String

	// Se realiza una consulta para obtener los datos de un usuario
	$users=$collection->findOne(array('usuario' => $usuario));
			
	// Recorremos los datos para saber si el usuario existe
	foreach($users as $campos => $datos){

		// Comprobamos el campo email
		if($campos=='email'){

			// Se guarda el email en la variable local
			$email=$datos;

		} // Cierre del if

	} // Cierre del bucle foreach

	// Devuelve la variable local en String
	return $email;

} // Cierre de la función obtenerEmail


/*
* obtenerUsuario. Se obtiene el campo username de la bd.
* parans --> $email. Se obtiene del formulario.
* return --> El usuario en String.
*/
function obtenerUsuario($email){

	// Variable global
	global $collection;

	// Variable local 
	$usuario=''; // Se establece el valor vacío de String

	// Se realiza una consulta para obtener los datos de un usuario
	$users=$collection->findOne(array('email' => $email));
			
	// Recorremos los datos para saber si el email existe
	foreach($users as $campos => $datos){

		// Comprobamos el campo usuario
		if($campos=='usuario'){

			// Se guarda el email en la variable local
			$usuario=$datos;

		} // Cierre del if

	} // Cierre del bucle foreach

	// Devuelve la variable local en String
	return $usuario;

} // Cierre de la función obtenerUsuario

function obtenerIdUsuario($usuario){

	// Variable global
	global $collection;

	// Variable local 
	$id=''; // Se establece el valor vacío de String

	// Se realiza una consulta para obtener los datos de un usuario
	$users=$collection->findOne(array('usuario' => $usuario));

	// Recorremos los datos para saber si el email existe
	foreach($users as $campos => $datos){

		// Comprobamos el campo usuario
		if($campos=='_id'){
			// Se guarda el email en la variable local
			$id=$datos;

		} // Cierre del if

	} // Cierre del bucle foreach

	// Devuelve la variable local en String
	return $id;

}

function verificarPassword($usuario,$password){

	// Variable global
	global $collection;

	// Variable local 
	$correcto=false; // Se establece el valor false

	// Se realiza una consulta para obtener los datos de un usuario en concreto
	$users=$collection->findOne(array('usuario' => $usuario));

	// Recorremos los datos para saber si el email existe
	foreach($users as $campos => $datos){

		// Si la contraseña es igual
		if($datos==$password){

			// Se establece a la variable local el valor true
			return $correcto=true;

		} // Cierre del if

	} // Cierre del bucle foreach

	// Devuelve el valor de la variable local
	return $correcto;

} // Cierre de la función comprobarPassword

function peliculaExiste($nombre){

	// Variable global
	global $collection2;

	// Variable local 
	$existe=false; // Se establece el valor false

	// Se realiza una consulta para obtener los dato de una pelicula 
	$peliculas=$collection2->findOne(array('title' => $nombre));

	// Recorremos los datos para saber si la pelicula existe
	foreach($peliculas as $campos => $datos){

		// Si la pelicula existe, devolverá un true
		if($datos==$nombre){

			// Se establece a la variable local el valor true
			return $existe=true;			

		} // Cierre del if		

	} // Cierre del bucle foreach

	return $existe;	


}  //Cierre de la función peliculaExiste

?>