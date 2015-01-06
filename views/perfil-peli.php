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

	<title>Perfil Pelicula</title>

	<!--para el favicon-->
    <link rel="icon" type="image/png" href="../images/favicon.png" />
	<link rel="stylesheet" type="text/css" href="../css/perfil-peli.css"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/perfil-peli.js"></script>
    <!--CSS bootstrap-->
    <link rel="stylesheet" type="text/css" href="../css/dist/css/bootstrap.css">

    <!-- Mensajes flash -->
    <link rel="stylesheet" type="text/css" href="../css/mensajes.css">

	<!--para full screen video, pantalla completa-->
	<script type="text/javascript">
	    $(document).ready(function(){
	        //Funcion que se activa al evento click del button o boton
	        $('#amplia').click(function(){
	                 // Codigo para activar pantalla completa en Chrome o Safari 5
	                 //Seleccionamos el elemnento video del ID video, en este caso la misma etiqueta video
	                 var elem = document.getElementById("bgvid");
						if (elem.requestFullscreen) {
						  elem.requestFullscreen();
						} else if (elem.msRequestFullscreen) {
						  elem.msRequestFullscreen();
						} else if (elem.mozRequestFullScreen) {
						  elem.mozRequestFullScreen();
						} else if (elem.webkitRequestFullscreen) {
						  elem.webkitRequestFullscreen();
						}                           
	        });
	    });
	 </script>

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
</head>
<body>
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
                            <!-- Items logueo -->
                            

                                <?php

                                    // Diseño en un archivo externo
                                    echo "<link href=\"../css/main.css\" rel=\"stylesheet\" type=\"text/css\" >";

                                    // Se inicia sesión o reanuda la sesión
                                    session_start();

                                    if(!(isset($_SESSION['id_usuario']) && $_SESSION['id_usuario']!='')){

                                        // Se incluye el archivo noLog que contiene los dos botones
                                        include("noLog.html");


                                    }
                                    else{

                                        // Link para ir al perfil de usuario
                                        echo "<a href='views/profile.php' class='link'>Hola, <b>" . $_SESSION["nombreUsuario"]."</b></a>";

                                        //Boton salir
                                        include("log.html");

                                    }

                                ?>

                        </ul> <!-- Cierre de la lista desordenada -->
                    </nav> <!-- Cierre del menú -->
            </header> <!-- Cierre del encabezado -->

<video autoplay poster="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/polina.jpg" id="bgvid" loop>
    <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
        <!--<source src="//demosthenes.info/assets/videos/polina.webm" type="video/webm">-->
        <source src="https://dl.dropboxusercontent.com/u/87532981/Ella%20May%20and%20the%20Wishing%20Stone%20By%20Cary%20Fagan.mp4" type="video/mp4"></source>
</video>

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
	<div id="infopeli">
		<h1>AFTER US</h1>
		<div class="ec-stars-wrapper">
			<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
			<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
			<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
			<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
			<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
		</div>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur porta dictum turpis, eu mollis justo gravida ac. Proin non eros blandit, rutrum est a, cursus quam. Nam ultricies, velit ac suscipit vehicula, turpis eros sollicitudin lacus, at convallis mauris magna non justo. Etiam et suscipit elit. Morbi eu ornare nulla, sit amet ornare est. Sed vehicula ipsum a mattis dapibus. Etiam volutpat vel enim at auctor.</p>
		<p>Aenean pharetra convallis pellentesque. Vestibulum et metus lectus. Nunc consectetur, ipsum in viverra eleifend, erat erat ultricies felis, at ultricies mi massa eu ligula. Suspendisse in justo dapibus metus sollicitudin ultrices id sed nisl.</p>

        <div id="buttons">
            <img src="../images/video/pause.png" id="playButton" onclick="doFirst()" />
        </div>
        <div id="amplia">
            <img src="../images/video/full.png" />
        </div>

	</div>

	    <div id="div_abajo">
        <center><span style="font-size:20px;color:grey;" class="glyphicon glyphicon-chevron-down glyphicon-refresh-animate"></span></center>
     </div> <!-- Cierre del btn_abajo -->

	<div id="contCriticas">

    	<div class="criticas">

            <div id="coment">
                <?php

                    include_once("../config/database.php");
                    $collection=$bd->criticas;
                    $comenta = $collection->find();
                    $id_usuario;
                    $critica;
                    $username;

                    foreach ($comenta as $campo => $valor) {

                        foreach ($valor as $coment => $datos) {

                            if($coment=="id_usuario"){
                            
                                $id_usuario=$datos; 

                                $collection=$bd->usuarios;
                                $usuarios = $collection->findOne(array('_id' => new MongoId($id_usuario)));

                                foreach ($usuarios as $campo => $valor) {

                                    if($campo=="usuario"){
                                    
                                        echo "<b>".$valor."</b><br/>";

                                    }             
                                    
                                } 

                            } 

                            if($coment=="comentario"){
                            
                                echo $datos."<br/>";

                            }
                        }          
                        
                    }


                    //------------------------------------------------------------------------
                    // Muestra el mensaje flash
                    //------------------------------------------------------------------------
                    echo $msg->display();


                ?>
            </div>

            <!-- Si el usuario no está logueado no podrá comentar la película -->
            <?php

                if(!(isset($_SESSION['id_usuario']) && $_SESSION['id_usuario']!='')){

                    // No se muestra el textarea para comentar ni el botón


                }
                else{ ?>

                    <!--Input para comentar la película -->
                    <form role="form" method="post" action="../model/criticas.php">
                        <div class="form-group">
                            <div class="input-group"  style="width:330px;">
                                <textarea style="border-radius: 5px;" class="form-control" rows="3" name="criti" placeholder="Crítica"></textarea>
                            </div></br>
                        </div>
                        <button type="submit" name="enviarCritica" class="btn btn-primary" style="background:#00B8E6;border:none;">
                            <span class="glyphicon glyphicon-comment"></span> Comenta</button>
                    </form>

            <?php
               }

            ?>

		</div>
	</div>

    <!-- Pie de toda la página -->
    <?php include("footer.html"); ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery.js"></script> <!-- jQuery -->
    <script type="text/javascript" src="../css/dist/js/bootstrap.min.js"></script>
</body>
</html>