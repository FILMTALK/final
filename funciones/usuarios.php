<?php

// Se importa database.php para realizar consultas a la base de datos
include_once("../config/database.php");

/*
* obtenerIdUsuario. Se obtiene el campo id de la bd.
* parans --> $email. Se obtiene del formulario.
* return --> El id en String.
*/
function obtenerIdUsuario($email){

	// Variable global
	global $collection;

	// Variable local 
	$id=''; // Se establece el valor vacío de String

	// Se realiza una consulta para obtener los datos de un usuario
	$users=$collection->findOne(array('email' => $email));

	// Recorremos los datos de ese usuario en concreto
	foreach($users as $campos => $datos){

		// Filtramos el campo para obtener el dato
		if($campos=='_id'){

			// Se guarda el id único del usuario en una variable local
			$id=$datos;

		} // Cierre del if

	} // Cierre del bucle foreach

	// Devuelve la variable local en String
	return $id;

} // Cierre de la función obtenerIdUsuario

/*
* obtenerUsuario. Se obtiene el nombre del usuario de la bd.
* parans --> $id_usuario. Se obtiene desde la función obtenerIdUsuario.
* return --> Devuelve el nombre del usuario String.
*/
function obtenerUsuario($id_usuario){

	// Variable global
	global $collection;

	// Variable local 
	$usuario=''; // Se establece el valor vacío de String

	// Se realiza una consulta para obtener los datos de un usuario
	$users=$collection->findOne(array('_id' => $id_usuario));
			
	// Recorremos los datos
	foreach($users as $campos => $datos){

		// Comprobamos el campo usuario
		if($campos=='usuario'){

			// Se guarda el usuario en la variable local
			$usuario=$datos;

		} // Cierre del if

	} // Cierre del bucle foreach

	// Devuelve la variable local en String
	return $usuario;

} // Cierre de la función obtenerUsuario


/*
* obtenerDatosUsuario. Se obtiene los datos del usuario.
* parans --> $id_usuario. Se obtiene desde la función obtenerIdUsuario.
* return --> Devuelve el array de datos del usuario.
*/
function obtenerDatosUsuario($id_usuario){

	// Variable global
	global $collection;

	// Se realiza una consulta para obtener los datos de un usuario
	$users=$collection->findOne(array('_id' => $id_usuario));

	// Devuelve los datos del usuario en un
	return $users;

} // Cierre de la función obtenerDatosUsuario



/*
* usuarioExiste. Para comprobar si un usuario existe con un email en la bd.
* parans --> $email. Se obtiene del formulario.
* return --> Si el usuario existe retorna true, sino false.
*/
function usuarioExiste($email){

	// Variable global
	global $collection;

	// Variable local 
	$existe=true; // Se establece el valor true

	// Se realiza una consulta para obtener los dato de un usuario 
	$users=$collection->findOne(array('email' => $email));
	
	// Si el array es igual a NULL
	if($users==NULL){

		// Se establece la variable local con el valor false
		$existe=false;

	}

	// Devuelve el valor de la variable local
	return $existe;	

} // Cierre de la función usuarioExiste


/*
* usernameExiste. Para comprobar si un usuario existe con un nombre de usuario en la bd.
* parans --> $email. Se obtiene del formulario.
* return --> Si el usuario existe retorna true, sino false.
*/
function usernameExiste($usuario){

	// Variable global
	global $collection;

	// Variable local 
	$existe=true; // Se establece el valor true

	// Se realiza una consulta para obtener los dato de un usuario 
	$users=$collection->findOne(array('usuario' => $usuario));
	
	// Si el array es igual a NULL
	if($users==NULL){

		// Se establece la variable local con el valor false
		$existe=false;

	}

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
function obtenerEmail($id_usuario){

	// Variable global
	global $collection;

	// Variable local 
	$email=''; // Se establece el valor vacío de String

	// Se realiza una consulta para obtener los datos de un usuario
	$users=$collection->findOne(array('_id' => $id_usuario));
			
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
* verificarPassword. Para comprobar si el usuario ha introducido la contraseña correcta.
* parans --> $usuario. Se obtiene del formulario.
* 		 --> $password. Se obtiene password cifrado del formulario.
* return --> Si el la contraseña coincide con la de bd devolverá true, sino false.
*/
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


?>