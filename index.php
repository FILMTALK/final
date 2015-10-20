<?php 
	
	// Importamos el fichero database.php para la conexión a la base de datos en la nube
	include_once("config/database.php");

	// Si no se ha podido conectarse a la base de datos
	if(!$collection){

		// Mostrará un aviso por pantalla
		echo "Failed to connect to filmdate";
	}
	else{

		// Redirecciona a la pagina principal
		include_once("model/peliculas.php");
	}

?>