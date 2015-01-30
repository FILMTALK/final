<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">

	<!-- Cabecera de toda la página -->
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title> filmdate </title>
        <!--para el favicon-->
        <link rel="icon" type="image/png" href="../images/favicon.png" />
        <!-- El diseño está en un archivo externo -->
		<link rel="stylesheet" href="../css/main.css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script> 
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
        <!-- jQuery de slider -->
        <script type="text/javascript" src="../js/slider.js"></script>
        <!--CSS bootstrap-->
        <link rel="stylesheet" type="text/css" href="../css/dist/css/bootstrap.css">
        <!-- jQuery para menu respontive -->
        <script type="text/javascript" src="../js/menu.js"></script>
        <!-- JavaScript para validar los campos -->
        <script type="text/javascript" src="../js/validacion.js"></script>
        <!-- Script para NewRelic -->
        <script type="text/javascript" src="../js/NewRelic.js"></script>    
        <!-- Tipografia de google, para el mouseover -->
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>        
	</head> <!-- Cierre del encabezado de la página -->
	
	<!-- Cuerpo de toda la página -->
	<body>	

		<!-- Engloba todas las etiquetas -->
		<div id="container"> 

            <!-- Encabezado de toda la página -->                    
            <?php include("includes/headerInicio.html"); ?>

            <!-- Representa el slider-->
            <div class="slider">  

                <!-- jQuery handles to place the header background images -->
                <div id="headerimgs">

                    <div id="headerimg1" class="headerimg"></div>
                    <div id="headerimg2" class="headerimg"></div>

                </div> <!-- Cierre de headerimgs -->

                <!-- Slideshow controls -->
                <div id="headernav-outer">

                    <!-- Botones de navegador -->
                    <div id="headernav">

                        <div id="back" class="btn"></div>
                        <div id="next" class="btn"></div>

                    </div> <!-- Cierre de nav -->

                </div> <!-- Cierre de los controles del slideshow -->

            </div> <!-- Cierre del slider -->



            <!-- Representa el apartado de Cartelera -->
            <section id="cartelera">
                <!-- Boton para ir hacia abajo -->
                <div id="div_abajo">
                    <a href="#miancla"><center><span class="glyphicon-refresh-animate"><img src="../images/flecha-abajo.png"></span></center></a>
                 </div> <!-- Cierre del btn_abajo -->


                 <a name="miancla"></a>
                <h3> Cartelera </h3>

                <?php

                    // Se importa mediante un css externo
                    echo "<link href=\"../css/main.css\" rel=\"stylesheet\" type=\"text/css\" >";

                    include_once("funciones/peliculas.php");                    

                    // Establecemos la colección
                    $collection=$bd->peliculas;

                    // Se obtiene sólo 5 registros que sean de cartelera
                    $cartelera=$collection->find(array("boxOffice" => "boxOffice"))->limit(5);

                    // Se recorre el array de cartelera
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

                            

                            if($movie=="poster"){
                                echo "<div class='descrip'>";
                                $poster=$dato;
                                echo "<a href='views/perfil-peli.php?peli=$titulo'><span class='text'>";

                                    // Establecemos la colección
                                    $collection=$bd->valoracion;

                                    $media=mediaValoracion("$id_pelicula");

                                    $media=$media*2;

                                    $media=round($media,2);

                                    echo "<span style='font-size:20px;'
                                    class='glyphicon glyphicon-star'></span><br/>";

                                    echo $media;

                                echo"</span><img src=$poster></a><br/><br/>
                                <h4><a href='views/perfil-peli.php?peli=$titulo'>" . $titulo. "</a></h4>";                      

                            }                            

                            if($movie=="year"){

                                $year=$dato;
                                echo "<p>" . $year. "</p>";

                            }

                            if($movie=="runtime"){

                                $runtime=$dato;
                                echo "<p>" . $runtime. " mins </p>";
                                echo "</div>";
                            }

                            
                        }

                        echo "</div>";
                    }

                ?>     

                <div class="vermas" onclick="location.href='views/cartelera.php'">
                    <span><img src="../images/plus_azul.png"></span>
                </div>       

            </section> <!--Cierre de la Cartelera -->

            <!-- Representa el apartado de Próximamente -->
            <section id="proximamente">

                <h3> Próximamente </h3>

                <?php

                    echo "<link href=\"../css/main.css\" rel=\"stylesheet\" type=\"text/css\" >";

                    // Establecemos la colección
                    $collection=$bd->peliculas;

                    // Se obtiene sólo 5 registros que las películas próximamente
                    $proximamente=$collection->find(array("upcoming" => "upcoming"))->limit(5);

                    foreach ($proximamente as $campo => $valor) {

                        echo "<div class='peli'>";

                        foreach ($valor as $movie => $dato) {

                            $titulo;
                            $id_pelicula2;
                            $year;
                            $runtime;
                            $poster;

                            if($movie=="_id"){

                                $id_pelicula2=$dato;

                            }


                            if($movie=="title"){

                                $titulo=$dato;
                            }

                            

                            if($movie=="poster"){
                                echo "<div class='descrip'>";
                                $poster=$dato;
                                
                                // Cuando el usuario haga clic en la imágen o en el título irá al perfil de la película
                                echo "<a href='views/perfil-peli.php?peli=$titulo'><span class='text'>";
                                    //include_once("includes/mediaNota.php");
                                    // Establecemos la colección
                                    $collection=$bd->valoracion;

                                    $media=mediaValoracion("$id_pelicula2");

                                    $media=$media*2;

                                    $media=round($media,2);

                                    echo "<span style='font-size:20px;'
                                    class='glyphicon glyphicon-star'></span><br/>";

                                    echo $media;

                                echo"</span><img src=$poster></a><br/><br/>
                                <h4><a href='views/perfil-peli.php?peli=$titulo'>" . $titulo. "</a></h4>";                      

                            }

                            if($movie=="year"){

                                $year=$dato;
                                echo "<p>" . $year. "</p>";

                            }

                            if($movie=="runtime"){

                                $runtime=$dato;
                                echo "<p>" . $runtime. " mins </p>";
                                echo "</div>"; 

                            }

                                 

                        }

                        echo "</div>";                
                    }

                ?>
                <div class="vermas" onclick="location.href='views/proximamente.php'">
                    <span><img src="../images/plus_azul.png"></span>
                </div>


            </section> <!--Cierre de la Próximamente -->

            <footer id="foot">

                <img class="red" style="padding-right:90px;" href="#" src="../images/red1.png"/>
                <img class="red" href="#" src="../images/red2.png"/>
                <img class="red" href="#" src="../images/red3.png"/>
                <img class="red"  href="#" src="../images/red4.png"/>

                <a href="views/apiTutorial.php"> API </a>
                <a href="#"> Política de privacidad </a>
                <a href="#"> © CopyRight 2014 </a>

            </footer>

            <!--Ventana Modal del Log In-->
            <?php include("includes/ventanaModalLogin.html"); ?>


            <!--Ventana Modal del Sign In-->
            <?php include("includes/ventanaModalSignin.html"); ?>

             
         </div> <!-- Cierre div del container -->

        <!-- Para las ventanas modales -->
        <script type="text/javascript" src="https://code.jquery.com/jquery.js"></script> <!-- jQuery -->
        <script type="text/javascript" src="../css/dist/js/bootstrap.min.js"></script>

	</body>
	
</html>