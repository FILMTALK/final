<?php
// Se importa database.php para realizar consultas a la base de datos
include_once("../config/database.php");
// Se establece la colección
$collection=$bd->peliculas;
// Se requiere las sesiones para los mensajes flash
if( !session_id() ) session_start();
// Requiere la clase de mensajes y se instancia el objeto de tipo Messages
require_once('../controller/class.messages.php');
$msg = new Messages();
// Se importa los archivos css
echo "<link href=\"../css/mensajes.css\" rel=\"stylesheet\" type=\"text/css\" >";
echo "<link href=\"../css/buscar.css\" rel=\"stylesheet\" type=\"text/css\" >";

// Si la variable POST de pelicula contiene un valor
if(isset($_POST['pelicula'])){
	// Se convierte a minúsculas
	$peliculaUsuario=strtolower($_POST['pelicula']);
	// Se eliminan los espacios del inicio y final
	$peliculaUsuario=trim($peliculaUsuario);
	// Se consulta la colección peliculas
	$peliculas=$collection->find();
	// Se crea un array vacío
	$array=array();
	// Variable local
	$titulo;
	$titulo_min;
	$encontrado;
	// Se recorre el array bidimensional de peliculas
	foreach($peliculas as $campos => $values){

		foreach($values as $campo => $datos){			

			if($campo=="title"){
				// Se guarda el titulo de cada película
				$titulo=$datos;
				// Se convierte a minúsculas
				$titulo_min=strtolower($datos);
				// Encuentra la posición de la película del usuario en el título convertido a minúsculas
				$encontrado = strpos($titulo_min, $peliculaUsuario);
				// Si coincide
				if($encontrado !== FALSE){
					// Si son iguales
					if(strtolower($titulo)==$titulo_min){
						// Se guarda el titulo en el array
						array_push($array,$titulo);

					}

				}	

			}

		}

	} // Cierre del foreach de peliculas
	// Si el array está vacío
	if(count($array)==0){
		// Mensaje de error a mostrar
		$msg->add('e', 'ERROR: No existe pel&iacute;cula con la b&uacute;squeda');
		// Muestra el mensaje por pantalla
		echo $msg->display();
		// Imprime un mensaje y termina el script actual
		exit();
	}
	else{

		// Variables locales
		$titulo;
		$year;
		$runtime;
		$poster;
		$synopsis;

		// Se recorre el array guardado los títulos que han coincidido
		foreach($array as $values){
			// Se realiza una búsqueda por cada título coincidido
			$mostrar=$collection->find(array('title' => $values));
			// Se recorre el array devuelto por MongoLab
			foreach ($mostrar as $campos => $datos) {		

				foreach($datos as $campo => $dato){

					if($campo=="poster"){

						$poster=$dato;	
						// Muestra el poster de la película
						echo "<div class='primary'>";
						echo "<a href='../views/perfil-peli.php?peli=$titulo'><img src=$poster></a>";
						echo "</div>";					
					}					

					if($campo=="title"){

						$titulo=$dato;
					}

					if($campo=="year"){

						$year=$dato;
					}

					if($campo=="runtime"){

						$runtime=$dato;
					}

					if($campo=="synopsis"){

	                    $synopsis=$dato;
	                }        
				}	
	            // Muestra el título y la descripción de cada película encontrada
				echo "<div class='secondary'>";
					echo "<h4><a href='../views/perfil-peli.php?peli=$titulo'>" . $titulo. "</a></h4>";
					echo "<p>Ano: $year </p>";
					echo "<p>Duracion: $runtime mins </p>";
					echo "<p>Sinopsis: $synopsis </p>";
				echo "</div>";
			} // Cierre del foreach de mostrar los datos que coinciden
		
		} // Cierre del array
	}
} // Cierre del POST	
?>