<html>

	<head>
		<meta charset="utf8"/>
		<title> Próximamente </title>
		<link rel="stylesheet" href="../css/listaPelis.css" /> <!-- El diseño está en un archivo externo -->
		
		<!--CSS bootstrap-->
        <link rel="stylesheet" type="text/css" href="../css/dist/css/bootstrap.css">

	</head>

	<body>

		<nav id="menu_nav">

			<!-- Lista desordenada -->
            <ul>

				<!-- Links para acceder a las demás páginas de la aplicación -->
				<li><a href='/index.php'> Inicio </a> <br/></li> 
				
				<li><a href='cartelera.php'> Cartelera </a> <br/></li>

				<li><a href='proximamente.php'> Próximamente </a> <br/></li>

			</ul>

		</nav> <!-- Cierre del menú -->

		<!-- Representa el apartado de Próximamente -->
        <section id="proximamente">

			<h3> Próximamente </h3>

			<?php

				// Importamos el fichero database.php para la conexión a la base de datos en la nube
				include_once("../config/database.php");

				echo "<link href=\"../css/listaPelis.css\" rel=\"stylesheet\" type=\"text/css\" >";

				// Establecemos la colección
				$collection=$bd->peliculas;

				$proximamente=$collection->find(array("upcoming" => "upcoming"));

				//var_dump(iterator_to_array($proximamente));

				foreach ($proximamente as $campo => $valor) {

					echo "<div class='peli'>";

					foreach ($valor as $movie => $dato) {

						$titulo;
						$year;
						$runtime;
						$poster;

						if($movie=="poster"){

							$poster=$dato;
							echo "<a href='perfil-peli.php'><img src=$poster></a>";

						}

						echo "<div class='descrip'>";

						if($movie=="title"){

							$titulo=$dato;
							echo "<h4><a href='perfil-peli.php'>" . $titulo. "</a></h4>";

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

		</section> <!-- Cierre de la Próximamente -->

	</body>

</html>