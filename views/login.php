<?php

//------------------------------------------------------------------------------
// A session is required for the messages to work
//------------------------------------------------------------------------------
if( !session_id() ) session_start();

//------------------------------------------------------------------------------
// Include the Messages class and instantiate it
//------------------------------------------------------------------------------
require_once('../controller/class.messages.php');
$msg = new Messages();

//------------------------------------------------------------------------------
// Add some messages
//------------------------------------------------------------------------------
//$msg->add('s', 'The is a sample Success Message');
//$msg->add('e', 'The is a sample Error Message');
//$msg->add('w', 'The is a sample Warning Message');
//$msg->add('i', 'The is a sample Information Message');

include_once("../config/database.php");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">

	<!-- Cabecera de toda la página -->
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title> filmdate </title>
        <!--para el favicon-->
        <link rel="icon" type="image/png" href="../images/favicon.png" />

		<link rel="stylesheet" href="../css/logueo.css" /> <!-- El diseño está en un archivo externo -->

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script> 
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
        <!--CSS bootstrap-->
        <link rel="stylesheet" type="text/css" href="../css/dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/mensajes.css">
        <!-- jQuery para menu respontive -->
        <script type="text/javascript" src="../js/menu.js"></script>
        <!-- JavaScript para validar los campos -->
        <script type="text/javascript" src="../js/validacion.js"></script> 
        <!-- Tipografia de google, para el mouseover -->
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>          
	</head> <!-- Cierre del encabezado de la página -->
	
	<!-- Cuerpo de toda la página -->
	<body>	

		<!-- Engloba todas las etiquetas -->
		<div id="container"> 

            <!-- Encabezado de toda la página -->
            <?php include("../includes/headerListaPelis.html"); 
	    
                echo "<div id='message'>";
    	            // Mostrar el mensaje flash
    	            echo $msg->display();
                echo "</div>";

	        ?>

            <!-- Representa el apartado de Cartelera -->
            <section id="cartelera">

                <h3> Cartelera </h3>

                <?php

                    echo "<link href=\"../css/listaPelis.css\" rel=\"stylesheet\" type=\"text/css\" >";

                    include_once("../funciones/peliculas.php");   

                    // Establecemos la colección
                    $collection=$bd->peliculas;

                    $cartelera=$collection->find(array("boxOffice" => "boxOffice"))->limit(5);

                    foreach ($cartelera as $campo => $valor) {

                        echo "<div class='peli'>";

                        foreach ($valor as $movie => $dato) {

                            $id_pelicula;
                            $titulo;
                            $year;
                            $runtime;
                            $poster;

                            if($movie=="_id"){

                                $id_pelicula=$dato;

                            }

                            if($movie=="title"){

                                $titulo=$dato;
                            }

                            echo "<div class='descrip'>";

                            if($movie=="poster"){

                                $poster=$dato;
                                
                                // Cuando el usuario haga clic en la imágen o en el título irá al perfil de la película
                                echo "<a href='perfil-peli.php?peli=$titulo'><span class='text'>";

                                    // Establecemos la colección
                                    $collection=$bd->valoracion;

                                    $media=mediaValoracion("$id_pelicula");

                                    $media=$media*2;

                                    $media=round($media,2);

                                    echo "<span style='font-size:20px;'
                                    class='glyphicon glyphicon-star'></span><br/>";

                                    echo $media;

                                echo "</span><img src=$poster></a>
                                <h4><a href='perfil-peli.php?peli=$titulo'>" . $titulo. "</a></h4>";                      

                            }

                            if($movie=="year"){

                                $year=$dato;
                                echo "<p>" . $year. "</p>";

                            }

                            if($movie=="runtime"){

                                $runtime=$dato;
                                echo "<p>" . $runtime. " mins </p>";

                            }

                            echo "</div>";
                        }

                        echo "</div>";
                    }

                ?>     

                <div class="vermas" onclick="location.href='cartelera.php'">
                    <span><img src="../images/plus_azul.png"></span>
                </div>       

            </section> <!--Cierre de la Cartelera -->

            <!-- Representa el apartado de Próximamente -->
            <section id="proximamente">

                <h3> Próximamente </h3>

                <?php

                    echo "<link href=\"../css/listaPelis.css\" rel=\"stylesheet\" type=\"text/css\" >";

                    // Establecemos la colección
                    $collection=$bd->peliculas;

                    $proximamente=$collection->find(array("upcoming" => "upcoming"))->limit(5);

                    foreach ($proximamente as $campo => $valor) {

                        echo "<div class='peli'>";

                        foreach ($valor as $movie => $dato) {

                            $id_pelicula2;
                            $titulo;
                            $year;
                            $runtime;
                            $poster;

                            if($movie=="_id"){

                                $id_pelicula2=$dato;

                            }

                            if($movie=="title"){

                                $titulo=$dato;
                            }

                            echo "<div class='descrip'>";

                            if($movie=="poster"){

                                $poster=$dato;
                                
                                // Cuando el usuario haga clic en la imágen o en el título irá al perfil de la película
                                echo "<a href='perfil-peli.php?peli=$titulo'><span class='text'>";

                                    // Establecemos la colección
                                    $collection=$bd->valoracion;

                                    $media=mediaValoracion("$id_pelicula2");

                                    $media=$media*2;

                                    $media=round($media,2);

                                    echo "<span style='font-size:20px;'
                                    class='glyphicon glyphicon-star'></span><br/>";

                                    echo $media;

                                echo "</span><img src=$poster></a>
                                <h4><a href='perfil-peli.php?peli=$titulo'>" . $titulo. "</a></h4>";                      

                            }

                            if($movie=="year"){

                                $year=$dato;
                                echo "<p>" . $year. "</p>";

                            }

                            if($movie=="runtime"){

                                $runtime=$dato;
                                echo "<p>" . $runtime. " mins </p>";

                            }

                            echo "</div>";      

                        }

                        echo "</div>";                
                    }

                ?>
                <div class="vermas" onclick="location.href='proximamente.php'">
                    <span><img src="../images/plus_azul.png"></span>
                </div>


            </section> <!--Cierre de la Próximamente -->

            <!-- Pie de toda la página -->
            <?php include("../includes/footer.html"); ?>


            <!--Ventana Modal del Log In-->
            <?php include("../includes/ventanaModalLogin.html"); ?>


            <!--Ventana Modal del Sign In-->
            <?php include("../includes/ventanaModalSignin.html"); ?>

             
         </div> <!-- Cierre div del container -->

        <!-- Para las ventanas modales -->
        <script type="text/javascript" src="https://code.jquery.com/jquery.js"></script> <!-- jQuery -->
        <script type="text/javascript" src="../css/dist/js/bootstrap.min.js"></script>

	</body>
	
</html>