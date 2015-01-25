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


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title>Perfil Película</title>

	<!--para el favicon-->
    <link rel="icon" type="image/png" href="../images/favicon.png" />
	<link rel="stylesheet" type="text/css" href="../css/perfil-peli.css"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/perfil-peli.js"></script>
    <script type="text/javascript" src="../js/valoracion.js"></script><!-- Valorar las estrellas -->
    <!--CSS bootstrap-->
    <link rel="stylesheet" type="text/css" href="../css/dist/css/bootstrap.css">
    <!-- Mensajes flash -->
    <link rel="stylesheet" type="text/css" href="../css/mensajes.css">
	<!--para full screen video, pantalla completa-->
    <script type="text/javascript" src="../js/fullscreenVideo.js"></script>
	<!-- jQuery para menu respontive -->
    <script type="text/javascript" src="../js/menu.js"></script> 
</head>
<body>

    <div id="contene">
    
    <!-- Encabezado de toda la página -->
    <?php include("../includes/header.html"); ?>

    <video autoplay id="bgvid" loop>

        <?php

            // Importamos el fichero database.php para la conexión a la base de datos en la nube
            include_once("../config/database.php");

            include_once("../funciones/peliculas.php");

            echo "<link href=\"../css/perfil-peli.css\" rel=\"stylesheet\" type=\"text/css\" >";


            // Establecemos la colección
            $collection=$bd->peliculas;

            // Se obtiene la id de la película desde las funciones pasando el parámetro de la peli obteniendo con el método GET.
            $id_pelicula=obtenerIdPelicula($_GET['peli']);

            $_SESSION['id_pelicula']=$id_pelicula; 

            // Se obtienen todos los datos de la pelicula
            $pelicula=obtenerDatosPelicula($_SESSION['id_pelicula']);

            foreach ($pelicula as $campo => $valor) {

                $url;

                if($campo=="trailer"){

                    $url=$valor;
                    echo "<source src='$url'></source>";


                }               

            }


        ?>

    </video>

	<!--Ventana Modal del Log In-->
    <?php include("../includes/ventanaModalLogin.html"); ?>

    <!--Ventana Modal del Sign In-->
    <?php include("../includes/ventanaModalSignin.html"); ?>

	<div id="infopeli">

        <?php

            // Se obtiene el titulo de la película mediante el método GET.
            $titulo = $_GET['peli'];
            echo "<h1> $titulo </h1>";

        ?>      

		<!-- Voto de estrellas -->
        <div id="<?php echo htmlspecialchars($_SESSION['id_pelicula']); ?>" class="ec-stars-wrapper votacion">
            <?php if($_SESSION['id_usuario']!=''): ?>
            <a href="#" id="<?php echo htmlspecialchars($_SESSION['id_pelicula']); ?>" class="estrellasValoracion" value="1" name="<?php echo htmlspecialchars($_SESSION['id_usuario']); ?>" title="Votar con 1 estrellas">&#9733;</a>
            <a href="#" id="<?php echo htmlspecialchars($_SESSION['id_pelicula']); ?>" class="estrellasValoracion" value="2" name="<?php echo htmlspecialchars($_SESSION['id_usuario']); ?>" title="Votar con 2 estrellas">&#9733;</a>
            <a href="#" id="<?php echo htmlspecialchars($_SESSION['id_pelicula']); ?>" class="estrellasValoracion" value="3" name="<?php echo htmlspecialchars($_SESSION['id_usuario']); ?>" title="Votar con 3 estrellas">&#9733;</a>
            <a href="#" id="<?php echo htmlspecialchars($_SESSION['id_pelicula']); ?>" class="estrellasValoracion" value="4" name="<?php echo htmlspecialchars($_SESSION['id_usuario']); ?>" title="Votar con 4 estrellas">&#9733;</a>
            <a href="#" id="<?php echo htmlspecialchars($_SESSION['id_pelicula']); ?>" class="estrellasValoracion" value="5" name="<?php echo htmlspecialchars($_SESSION['id_usuario']); ?>" title="Votar con 5 estrellas">&#9733;</a>
            <?php endif; ?>
            <div id="estrella">
                <?php

                    include_once("../includes/valoracion.php");
                 ?>
             </div>
            
        </div>

        <div id="limitar"></div>
      
        <!-- Muestra la sinopsis de la película correspondiente -->
        <?php 

            // Establecemos la colección
            $collection=$bd->peliculas;

            // Es un array de datos sobre la película consultada en la bd
            $datosPelicula=obtenerDatosPelicula($_SESSION['id_pelicula']);

            foreach ($datosPelicula as $campo => $valor) {

                $synopsis;

                if($campo=="synopsis"){

                    $synopsis=$valor;
                    echo "<p>$synopsis</p>";


                }               

            }

        ?>

        <!-- Botones para el vídeo -->
        <div id="buttons">
            <img src="../images/video/pause.png" id="playButton" onclick="doFirst()" />
        </div>
        <div id="amplia">
            <span class="glyphicon glyphicon-fullscreen" style="font-size:27px;"></span>
        </div>
        <!-- Cierre de los botones del vídeo -->

	</div> <!-- Cierre del id infopeli -->

	<div id="div_abajo">
        <a href="#miancla"><center><span class="glyphicon-refresh-animate"><img src="../images/flecha-abajo.png"></span></center></a>
    </div> <!-- Cierre del btn_abajo -->

    <!-- Parte de las críticas -->
    <a name="miancla"></a>
	<div id="contCriticas">

    	<div class="criticas">

            <div id="coment">

                <h2>Críticas</h2></br></br>
                <!-- Listado de los comentarios de la película obtenida de la BD -->
                <?php
                    //$id_pelicula = $_SESSION['id_pelicula'];
                    include_once("../includes/criticas.php");

                    //------------------------------------------------------------------------
                    // Muestra el mensaje flash
                    //------------------------------------------------------------------------
                    echo $msg->display();
                    
                ?>
                <div id="noVacia"></div>
            </div>

            <!-- Si el usuario no está logueado no podrá comentar la película -->
            <?php

                if(!(isset($_SESSION['id_usuario']) && $_SESSION['id_usuario']!='')){

                     ?> 

                    <!-- <div class="alert alert-warning"role="alert">
                      <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
                      <span class="sr-only">Warning:</span>
                     ¡Debes estar logueado para poder comentar!
                    </div>-->

                    <div id="warning">
                        <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
                        <span class="sr-only">Warning:</span>
                        ¡Debes estar logueado para poder comentar!
                    </div>
                    <form class="formulario" role="form" method="post">
                        <div class="form-group">
                            <div class="input-group" id="texti">
                                <textarea class="form-control" rows="2" placeholder="Crítica" disabled></textarea>
                            </div>
                        </div>
                        <button type="submit" id="diferente" class="btn btn-primary" style="background:#66cccc;border:none;margin-bottom:150px;" disabled>
                            <span class="glyphicon glyphicon-comment"></span> Comenta</button>
                    </form>
                <?php
                }
                else{ 
                    $id_usuario=$_SESSION['id_usuario'];
                    ?>

                    <!--Input para comentar la película -->
                    <form class="formulario" role="form" method="post">
                        <div class="form-group">
                            <div class="input-group"  id="texti">
                                <textarea class="form-control" rows="2" name="<?php echo htmlspecialchars($_SESSION['id_usuario']); ?>"
                                 id="critica" placeholder="Crítica" required></textarea>
                            </div>
                        </div>
                        <button type="submit" id="enviarCritica" class="btn btn-primary" style="background:#66cccc;border:none;margin-bottom:150px;" name="<?php echo htmlspecialchars($_SESSION['id_pelicula']); ?>">
                            <span class="glyphicon glyphicon-comment"></span> Comenta</button>
                    </form>

            <?php
               }

            ?>

		</div><!-- Cierre del div de críticas -->
	</div> <!-- Cierre del div de contCríticas -->

</div>
    

    <!-- Para las ventanas modales -->
    <script type="text/javascript" src="https://code.jquery.com/jquery.js"></script> <!-- jQuery -->
    <script type="text/javascript" src="../css/dist/js/bootstrap.min.js"></script>
    
</body>
</html>