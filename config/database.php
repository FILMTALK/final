<?php
	
	// Variable global
	$collection;
	$bd;

	try{

		// Conexión a la base de datos MongoLab
	    $conexion=new MongoClient("mongodb://filmdate:zubiri14@ds043220.mongolab.com:43220/openshift_ncp648lb_i71frbbr");
	    
	    // Se establece la bd
	    $bd=$conexion->openshift_ncp648lb_i71frbbr;

	    // Se establece la colección
	    $collection=$bd->usuarios;
    	    
	}
	catch(MongoConnectionException $e){

		// Mostrará la excepción por pantalla
	    die("Failed to connect to database ".$e->getMessage());
	}
	
?>
