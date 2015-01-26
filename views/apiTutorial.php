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

                <h2>getPeliculas</h2>

                <p>Con esta URL proporcionamos todas las peliculas que se encuentran en nuestra app. Se devuelve
                en un objeto de tipo JSON, para poder obtener los datos facilmente. </p>

                <code class="language-javascript">
                    $app->get('/getPeliculas', function () {<br/>
                        global $collection;<br/>
                        $peliculas=$collection->find();<br/>
                        header('Content-Type: application/json');<br/>
                        echo json_encode(iterator_to_array($peliculas));<br/>
                    });
                </code>
            </div>


        </div> <!-- div de Container -->

        
        <!-- jQuery para ventana modal -->
        <script type="text/javascript" src="https://code.jquery.com/jquery.js"></script> <!-- jQuery -->
        <script type="text/javascript" src="../css/dist/js/bootstrap.min.js"></script>

    </body>

</html>