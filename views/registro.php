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
        <!-- Mensajes flash -->
        <link rel="stylesheet" type="text/css" href="../css/mensajes.css">

        <!-- jQuery para menu respontive -->
        <script type="text/javascript">
        
            $(document).ready(function(){

                //Obtenemos el link que contenga el id pull
                var pull=$('#pull');

                //Obtenemos todos las etiquetas ul que contenga la etiqueta nav
                var menu=$('ul');

                var html=$('html');

                //Guardamos la altura del menú en una variable
                var menuHeight=menu.height();

                //Cuando haga clic en el link, realizaremos una función con pasando un parámetro
                $(pull).on('click', function(e) {

                    e.preventDefault();
                    menu.slideToggle();

               
                });  //Cierre del método on



                //Cuando la ventana se hace más pequeño, se realiza la siguiente función
                $(window).resize(function(){

                  //Gaurdamos en una variable el width de la ventana de forma local
                  var w=$(window).width();

                  //Si la anchura es mayor que 700px, el slider debe aparecer
                  if(w>700) {

                    //Eliminamos el atributo style del menú
                    menu.removeAttr('style');

        
                  }

                //Cierre de la función resize
                });

            //Cierre de la función general    
            });

        </script> <!-- Cierre de jQuery del slider -->
        
	</head> <!-- Cierre del encabezado de la página -->
	
	<!-- Cuerpo de toda la página -->
	<body>	

		<!-- Engloba todas las etiquetas -->
		<div id="container"> 

            <!-- Encabezado de toda la página -->
                    
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


                            <?php  echo "<link href=\"../css/logueo.css\" rel=\"stylesheet\" type=\"text/css\" >"; include("noLog.html"); ?>

                        </ul> <!-- Cierre de la lista desordenada -->
                    </nav> <!-- Cierre del menú -->
            </header> <!-- Cierre del encabezado -->

	        <?php
	    
	            //------------------------------------------------------------------------
	            // Mostrar el mensaje flash
	            //------------------------------------------------------------------------
	            echo $msg->display();

	        ?>

            <!-- Representa el apartado de Cartelera -->
            <section id="cartelera">

                <h3> Cartelera </h3>

                <?php

                    echo "<link href=\"../css/logueo.css\" rel=\"stylesheet\" type=\"text/css\" >";

                    // Establecemos la colección
                    $collection=$bd->peliculas;

                    $cartelera=$collection->find(array("boxOffice" => "boxOffice"))->limit(5);

                    foreach ($cartelera as $campo => $valor) {

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
                                echo "<h4>" . $titulo . "</h4>";
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
                    <span class="glyphicon glyphicon-plus"</span>
                </div>       

            </section> <!--Cierre de la Cartelera -->

            <!-- Representa el apartado de Próximamente -->
            <section id="proximamente">

                <h3> Próximamente </h3>

                <?php

                    echo "<link href=\"../css/logueo.css\" rel=\"stylesheet\" type=\"text/css\" >";

                    // Establecemos la colección
                    $collection=$bd->peliculas;

                    $proximamente=$collection->find(array("upcoming" => "upcoming"))->limit(5);

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
                                echo "<h4><a href='perfil-peli.php'>" . $titulo . "</a></h4>";

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
                    <span class="glyphicon glyphicon-plus"</span>
                </div>


            </section> <!--Cierre de la Próximamente -->

            <!-- Pie de toda la página -->
            <?php include("footer.html"); ?>


            <!--Ventana Modal del Log In-->
            <div class="modal fade" id="milogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                <div class="modal-dialog">

                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4>Inicia sesión</h4>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                             
                                    
                                        <div class="panel-body">
                                            <form role="form" method="post" action="../model/login.php">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Contraseña</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
                                                    </div>
                                                </div>
                                                <br/>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" class="btn btn-success" 
                                                    style="font-size:16px;margin-top:8px;">
                                                    <span class="glyphicon glyphicon-arrow-left"></span> Atras
                                                </button>
                                                <button type="submit" name="login" class="btn btn-primary" style="background:#66cccc;border:none;"><span class="glyphicon glyphicon-lock"></span> Logueate</button>
                                                <p><br/></p>
                                            </form>
                                        </div>
                                    
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <!--Ventana Modal del Sign In-->
            <div class="modal fade" id="miregistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                <div class="modal-dialog">

                    <div class="modal-content"  style="height:500px;margin-top:10%;">
                        
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4>Regístrate</h4>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                        <div class="panel-body">
                                            <form role="form" method="post" action="../model/registro.php">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nombre de usuario</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                                        <input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="Usuario">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Contraseña</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Repite la contraseña</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                                        <input type="password" name="password2" class="form-control" id="exampleInputPassword1" placeholder="Repite Contraseña">
                                                    </div>
                                                </div>
                                                <br/>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" class="btn btn-success" 
                                                    style="font-size:16px;margin-top:8px;">
                                                    <span class="glyphicon glyphicon-arrow-left"></span> Atras
                                                </button>
                                                <button type="submit" name="registro" class="btn btn-primary" style="background:#66cccc;border:none;"><span class="glyphicon glyphicon-lock"></span>Registrarte</button>
                                                <p><br/></p>
                                            </form>
                                        </div>      
                            </div>
                        </div>

                    </div>
                </div>
            </div>

             
         </div> <!-- Cierre div del container -->

        <script type="text/javascript" src="https://code.jquery.com/jquery.js"></script> <!-- jQuery -->
        <script type="text/javascript" src="../css/dist/js/bootstrap.min.js"></script>

	</body>
	
</html>