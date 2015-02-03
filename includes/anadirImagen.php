<?php
// Inicia sesión o reanudar la sesión	
session_start();
    include_once("../config/database.php");
    // Se guarda la variable de sesión
    $nombreUsuario = $_SESSION["nombreUsuario"];
    // Si la variable no tiene valor se obtiene desde la variable GET
    if(!isset($nombreUsuario)){
    	$nombreUsuario=$_GET('nombreUsuario');
    }
    // Se establece la colección de usuarios
    $collection=$bd->usuarios;
    // Se consulta mediante el nombre de usuario
    $datos=$collection->findOne(array('usuario' => "$nombreUsuario"));
    // Se recorre el array para mostrar la foto del usuario
    foreach ($datos as $key => $value) {

        if($key=="foto"){

            echo "<img id='fotoUsuario' src='".$value."' alt='Avatar'/><br /><br />";

        }
    }
?>