<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title> Búsqueda </title>
        <!--para el favicon-->
        <link rel="icon" type="image/png" href="../images/favicon.png" />
        <link rel="stylesheet" href="../css/buscar.css" /> <!-- El diseño está en un archivo externo -->

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

            <div id="titulo">
                 <h3>Resultados de la búsqueda</h3>
            </div>

            <?php include("../model/buscar.php"); ?>


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