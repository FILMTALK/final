<html>

	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title> Cartelera </title>
		<!--para el favicon-->
        <link rel="icon" type="image/png" href="../images/favicon.png" />
		<link rel="stylesheet" href="../css/listaPelis.css" /> <!-- El diseño está en un archivo externo -->

		<!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
		<!--CSS bootstrap-->
        <link rel="stylesheet" type="text/css" href="../css/dist/css/bootstrap.css">
        <!-- jQuery para menu respontive -->
        <script type="text/javascript" src="../js/menu.js"></script> 
	</head>

	<body>
		<!-- Engloba todas las etiquetas -->
		<div id="container"> 

			<!-- Encabezado de toda la página -->
			<?php include("../includes/headerListaPelis.html"); ?>

			<!-- Representa el listado de las películas de cartelera -->
	        <section id="cartelera">

				<h3> Cartelera </h3>

				<?php

					// Importamos el fichero database.php para la conexión a la base de datos en la nube
					include_once("../config/database.php");

					echo "<link href=\"../css/listaPelis.css\" rel=\"stylesheet\" type=\"text/css\" >";

					// Establecemos la colección
					$collection=$bd->peliculas;

					// Obtenemos sólo las películas de cartelera
					$cartelera=$collection->find(array("boxOffice" => "boxOffice"));

					// Se recorre el array obtenido
					foreach ($cartelera as $campo => $valor) {

						echo "<div class='peli'>";

						foreach ($valor as $movie => $dato) {

							$titulo;
							$year;
							$runtime;
							$poster;

                            if($movie=="title"){

                                $titulo=$dato;
                            }

                            echo "<div class='descrip'>";

                            if($movie=="poster"){

                                $poster=$dato;
                                
                                // Cuando el usuario haga clic en la imágen o en el título irá al perfil de la película
                                echo "<a href='perfil-peli.php?peli=$titulo'><img src=$poster></a>";
                                echo "<h4><a href='perfil-peli.php?peli=$titulo'>" . $titulo. "</a></h4>";                      

                            }

							if($movie=="year"){

								$year=$dato;
								echo $year. "<br>";

							}

							if($movie=="runtime"){

								$runtime=$dato;
								echo $runtime. " mins <br>";

							}

							echo "</div>";

						}

						echo "</div>";				      
					}

				?>

			</section> <!--Cierre de la Cartelera -->

	        <!-- Pie de toda la página -->
	        <?php include("../includes/footer.html"); ?>


			<!--Ventana Modal del Log In-->
	        <?php include("../includes/ventanaModalLogin.html"); ?>


	        <!--Ventana Modal del Sign In-->
	        <?php include("../includes/ventanaModalSignin.html"); ?>

		</div> <!-- div de Container -->

		<!-- Para las ventanas modales -->
		<script type="text/javascript" src="https://code.jquery.com/jquery.js"></script> <!-- jQuery -->
        <script type="text/javascript" src="../css/dist/js/bootstrap.min.js"></script>

	</body>

</html>