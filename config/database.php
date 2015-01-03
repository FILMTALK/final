<?php

	// Variable global
	$collection;
	$collection2;
	$bd;

	try{

		// Se conecta con la base de datos
	    $conexion=new MongoClient("mongodb://filmdate:zubiri14@ds043220.mongolab.com:43220/openshift_ncp648lb_i71frbbr");
	    
	    // Establecemos la base de datos
	    $bd=$conexion->openshift_ncp648lb_i71frbbr;

	    // Establecemos la colección (tabla)
	    $collection=$bd->usuarios;
	    $collection2=$bd->peliculas;
    	    
	}
	catch(MongoConnectionException $e){

		// Mostrará la excepción por pantalla
	    die("Failed to connect to database ".$e->getMessage());
	}
	
?>
