<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">

	<!-- Cabecera de toda la página -->
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title> Filmdate API</title>
        <!--para el favicon-->
        <link rel="icon" type="image/png" href="../images/favicon.png" />
		<!-- El diseño está en un archivo externo -->
		<link rel="stylesheet" href="../css/perfilUsuario.css" />
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
        <!--CSS bootstrap-->
        <link rel="stylesheet" type="text/css" href="../css/dist/css/bootstrap.css">
        <!-- jQuery para menu respontive -->
        <script type="text/javascript" src="../js/menu.js"></script>
        <!-- Tipografia de google -->
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>     
	</head> <!-- Cierre del encabezado de la página -->

	<body>
        <div id="container"> 
            
            <!-- Encabezado de toda la página -->
            <?php include("../includes/headerListaPelis.html"); ?>
            <!--Ventana Modal del Log In-->
            <?php include("../includes/ventanaModalLogin.html"); ?>
            <!--Ventana Modal del Sign In-->
            <?php include("../includes/ventanaModalSignin.html"); ?>

            <div id="textoApi">
               <h1> Welcome, Developers.</h1>
               <p>Filmdate proporciona diversas API y herramientas que permiten integrar la experiencia de Filmdate en tu sitio web, aplicación o dispositivo móvil.<br/>
                Este documento está diseñado para ayudarte a decidir qué API y herramientas se ajustan mejor a tus necesidades.</p>

                <div class="ruta">
                    <a class="linkjson" href="http://filmdate-filmdate.rhcloud.com/api/api.php/getPeliculas">getPeliculas 
                        <span class="glyphicon glyphicon-link" style="font-size:20px;"></span></a>

                    <p>Con esta URL proporcionamos todas las peliculas que se encuentran en nuestra app. Se devuelve
                    en un objeto de tipo JSON, para poder obtener los datos facilmente. 
                    <br/>Por ejemplo: <a class="apilink" href="http://filmdate-filmdate.rhcloud.com/api/api.php/getPeliculas">
                    http://filmdate-filmdate.rhcloud.com/api/api.php/getPeliculas</a></p>

                </div>

                <div class="ruta">
                    <a class="linkjson" href="http://filmdate-filmdate.rhcloud.com/api/api.php/getPelicula/Annie">getPelicula/:titulo
                        <span class="glyphicon glyphicon-link" style="font-size:20px;"></span></a>

                    <p>Con esta URL se puede filtrar por el titulo de la pelicula para obtener toda su 
                        información. Se devuelve en un objeto de tipo JSON.
                        <br/>Por ejemplo, con la pelicula "Big Hero 6": <a class="apilink" href="http://filmdate-filmdate.rhcloud.com/api/api.php/getPelicula/Big Hero 6">
                    http://filmdate-filmdate.rhcloud.com/api/api.php/getPelicula/Big Hero 6</a>
                    </p>
                    <div class="language">
                        <code>
                            $app->get('/getPelicula/:titulo', function ($titulo) {<br/>

                                &nbsp;&nbsp;  global $collection;<br/>

                                &nbsp;&nbsp;  $peliculas=$collection->findOne(array('title' => $titulo));<br/>

                                &nbsp;&nbsp;  header('Content-Type: application/json');<br/>

                                &nbsp;&nbsp;  echo json_encode($peliculas);<br/>
      
                            });
                        </code>
                    </div>
                </div>

                <div class="ruta"> 
                    <a class="linkjson" href="http://localhost:8080/api/api.php/getCartelera">getCartelera
                        <span class="glyphicon glyphicon-link" style="font-size:20px;"></span></a>

                    <p>Con esta URL proporcionamos todas las peliculas que se encuentran en la cartelera de nuestra
                     app. Se devuelve en un objeto de tipo JSON.
                     <br/>Por ejemplo: <a class="apilink" href="http://localhost:8080/api/api.php/getCartelera">
                    http://localhost:8080/api/api.php/getCartelera</a> </p>

                    <div class="language">
                        <code>
                            $app->get('/getCartelera', function () {<br/>

                                &nbsp;&nbsp;  global $collection;<br/>

                                &nbsp;&nbsp;  $cartelera=$collection->find(array("boxOffice" => "boxOffice"));<br/>

                                &nbsp;&nbsp;  header('Content-Type: application/json');<br/>

                               &nbsp;&nbsp;  echo json_encode(iterator_to_array($cartelera));<br/>

                            });
                        </code>
                    <p>
                    </div>
                </div>
                <div class="ruta">
                    <a class="linkjson" href="http://localhost:8080/api/api.php/getProximamente">getProximamente
                    <span class="glyphicon glyphicon-link" style="font-size:20px;"></span></a>

                    <p>Con esta URL proporcionamos todas las peliculas que se encuentran en la sección 
                    proximamente de nuestra app. Se devuelve en un objeto de tipo JSON.
                    <br/>Por ejemplo: <a class="apilink" href="http://localhost:8080/api/api.php/getProximamente">
                    http://localhost:8080/api/api.php/getProximamente</a> </p>

                    <div class="language">
                        <code>
                            $app->get('/getProximamente', function () {<br/>

                                &nbsp;&nbsp;  global $collection;<br/>

                                &nbsp;&nbsp;  $proximamente=$collection->find(array("upcoming" => "upcoming"));<br/>

                                &nbsp;&nbsp;  header('Content-Type: application/json');<br/>

                                &nbsp;&nbsp;  echo json_encode(iterator_to_array($proximamente));<br/>

                            });
                        </code>
                    </div>
                </div>
            </div>



        </div> <!-- div de Container -->

        <!-- Pie de toda la página -->
        <?php 

        // Se importa mediante un css externo
        echo "<link href=\"../css/perfilUsuario.css\" rel=\"stylesheet\" type=\"text/css\" >";
        include("../includes/footer.html"); ?>

        
        <!-- jQuery para ventana modal -->
        <script type="text/javascript" src="https://code.jquery.com/jquery.js"></script> <!-- jQuery -->
        <script type="text/javascript" src="../css/dist/js/bootstrap.min.js"></script>

    </body>

</html>
