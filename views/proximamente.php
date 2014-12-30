<html>

	<head>
		<meta charset="utf8"/>
		<title> Próximamente </title>
		<link rel="stylesheet" href="../css/listaPelis.css" /> <!-- El diseño está en un archivo externo -->
		
		<!--CSS bootstrap-->
        <link rel="stylesheet" type="text/css" href="../css/dist/css/bootstrap.css">

	</head>

	<body>

		<header id="header"> 
	        <!-- Imagen corporativa -->
	        <div id="logo">
	            <a href="/index.php"><img class="imgLogo"/></a>
	            <!-- Botón del menú -->
	            <a href="#" id="pull"><img src="../images/nav-icon.png" /></a>
	        </div> <!-- Cierre del logo -->
	        <!-- Menú -->
	        <nav id="menu_nav">
	            <!-- Lista desordenada -->
	            <ul>
	                <!-- Item 1, Cartelera --> 
	                <li>
	                    <a href="cartelera.php" class="link"> Cartelera </a>
	                </li> <!-- Cierre de la Cartelera -->
	                <!-- Item 2, Próximamente --> 
	                <li>
	                    <a href="proximamente.php" class="link"> Próximamente </a>
	                </li> <!-- Cierre de la Próximamente -->
	                <!-- Item 3, Buscador --> 
	                <li>
	                    <!-- Caja de buscador -->
	                    <div id="buscador">
	                         <form method="get" action="/search" id="search">
	                            <input name="q" type="text" size="40" placeholder="Buscar pelicula" />
	                        </form>
	                    </div> <!-- Cierre de la caja del buscador -->
	                </li> <!-- Cierre de la Buscador -->
	                <!-- Item 4, Registro -->
	                

	                    <?php

	                        echo "<link href=\"../css/listaPelis.css\" rel=\"stylesheet\" type=\"text/css\" >";

	                        session_start();

	                        if(!(isset($_SESSION['usuario']) && $_SESSION['usuario']!='')){

	                            include("noLog.html");


	                        }
	                        else{

	                            echo "<a href='views/profile.php' class='link'>Hola, <b>" . $_SESSION["usuario"]."</b></a>";

	                            include("log.html");

	                        }

	                    ?>

	            </ul> <!-- Cierre de la lista desordenada -->
	        </nav> <!-- Cierre del menú -->
		</header> <!-- Cierre del encabezado -->

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