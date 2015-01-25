<?php


// Se importa database.php para realizar consultas a la base de datos
include_once("../config/database.php");

// Variable global

$collection=$bd->peliculas;

//------------------------------------------------------------------------------
// Los mensajes flash requieren las sesiones 
//------------------------------------------------------------------------------
if( !session_id() ) session_start();

//------------------------------------------------------------------------------
// Se incluye la clase y se instancia
//------------------------------------------------------------------------------
require_once('../controller/class.messages.php');
$msg = new Messages();

echo "<link href=\"../css/mensajes.css\" rel=\"stylesheet\" type=\"text/css\" >";
echo "<link href=\"../css/buscar.css\" rel=\"stylesheet\" type=\"text/css\" >";

if(isset($_POST['pelicula'])){

	$peliculaUsuario=strtolower($_POST['pelicula']);

	$peliculaUsuario=trim($peliculaUsuario);

	$peliculas=$collection->find();

	$array=array();
	$titulo;
	$titulo_min;
	$encontrado;

	foreach($peliculas as $campos => $values){

		foreach($values as $campo => $datos){			

			if($campo=="title"){

				$titulo=$datos;
				$titulo_min=strtolower($datos);
				$encontrado = strpos($titulo_min, $peliculaUsuario);

				if($encontrado !== FALSE){

					if(strtolower($titulo)==$titulo_min){

						// Se guarda el titulo en el array
						array_push($array,$titulo);

					}

				}	

			}

		}

	}

	if(count($array)==0){

		// Mensaje de error a mostrar
		$msg->add('e', 'ERROR: No existe pel&iacute;cula con la b&uacute;squeda');

		// Muestra el mensaje por pantalla
		echo $msg->display();

		// Imprime un mensaje y termina el script actual
		exit();

	}
	else{

					$titulo;
					$year;
					$runtime;
					$poster;
					$synopsis;

		foreach($array as $values){

			$mostrar=$collection->find(array('title' => $values));
			foreach ($mostrar as $campos => $datos) {
				
				

				foreach($datos as $campo => $dato){

					if($campo=="poster"){

						$poster=$dato;	
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
	            
				echo "<div class='secondary'>";
					echo "<h4><a href='../views/perfil-peli.php?peli=$titulo'>" . $titulo. "</a></h4>";
					echo "<p>Ano: $year </p>";
					echo "<p>Duracion: $runtime mins </p>";
					echo "<p>Sinopsis: $synopsis </p>";
				echo "</div>";
			}
		
		}
	}
}
	
?>
