<?php

	// Variable global
	$collection;

	try{

		// Se conecta con la base de datos
	    $conexion=new MongoClient("mongodb://filmdate:zubiri14@ds063160.mongolab.com:63160/filmdate");

	    // Establecemos la base de datos
	    $bd=$conexion->filmdate;

	    // Establecemos la colección (tabla)
	    $collection=$bd->usuarios;
    	    
	}
	catch(MongoConnectionException $e){

		// Mostrará la excepción por pantalla
	    die("Failed to connect to database ".$e->getMessage());
	}
	
?>