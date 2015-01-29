<?php
	
session_start();

    include_once("../config/database.php");

    $nombreUsuario = $_SESSION["nombreUsuario"];

    if(!isset($nombreUsuario)){
    	$nombreUsuario=$_GET('nombreUsuario');
    }

    $collection=$bd->usuarios;

    $datos=$collection->findOne(array('usuario' => "$nombreUsuario"));

    foreach ($datos as $key => $value) {

        if($key=="foto"){

            echo "<img id='fotoUsuario' src='".$value."' alt='Avatar'/><br /><br />";

        }
    }

?>