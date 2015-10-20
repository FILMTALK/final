<?php
	
	// Variable global
	$collection;
	$bd;

	try{

		$conexion=new MongoClient("mongodb://admin:SQiGBdpNK1u5IS0h@SG-prueba-5724.servers.mongodirector.com:27017/admin?ssl=true");

		// Conexión a la base de datos MongoLab
	    //$conexion=new MongoClient("mongodb://filmdate:zubiri14@ds043220.mongolab.com:43220/openshift_ncp648lb_i71frbbr");
	    
	    // Se establece la bd
	    $bd=$conexion->admin;
	    //$bd=$conexion->openshift_ncp648lb_i71frbbr;

	    // Se establece la colección
	    $collection=$bd->usuarios;
    	    
	}
	catch(MongoConnectionException $e){

		// Mostrará la excepción por pantalla
	    die("Failed to connect to database ".$e->getMessage());
	}
	
?>
