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
<header id="header"> 
                    
	        <!-- Imagen corporativa -->
	        <div id="logo">

	            <a href="/index.php"><img id="logoTxiki" src="../images/logotxiki_gris.png" /></a>
	            <!-- Botón del menú -->
	            <a href="#" id="pull"><img src="../images/nav-icon.png" /></a>
	           

	        </div> <!-- Cierre del logo -->

	        

	        <!-- Menú -->
	        <nav id="menu_nav">
	            <ul>
	                <li>
	                    <a href="#" class="link"> Cartelera </a>
	                </li> <!-- Cierre de la Cartelera -->
	                <!-- Item 2, Próximamente --> 
	                <li>
	                    <a href="#" class="link"> Próximamente </a>
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
	                <li>
	                    <button class="btn btn-info" data-toggle="modal" data-target="#miregistro" 
	                    style="background-color:#bebebe; border:none; opacity:0.7; padding-left:5px;margin-right:10px;
	                    outline:none;">Sign in</button> 

	                </li> <!-- Cierre de la Registro -->
	                <!-- Item 5, Login --> 
	                <li>
	                    <button class="btn btn-info" id="btn_menu" data-toggle="modal" data-target="#milogin" 
	                    style="background-color:#bebebe; border:none; opacity:0.7;outline:none;">Log in</button>  
	                </li> <!-- Cierre de la Login -->
	            </ul> <!-- Cierre de la lista desordenada -->
	        </nav> <!-- Cierre del menú -->
	</header> <!-- Cierre del encabezado -->

	<video autoplay poster="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/polina.jpg" id="bgvid" loop>
  	<!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
		<!--<source src="//demosthenes.info/assets/videos/polina.webm" type="video/webm">-->
		<source src="../images/video/video.mp4" type="video/mp4">
	</video>
	<div id="contenedor">
		<h1>BOYHOOD</h1>
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

	<div id="amasa">

	<div id="iruzkin">
		<div id="iruzkin_header">
			<h3>Iruzkinak</h3>
		</div>
		<div id="iruzkinak">

				<div id="nork">
					
					<?php echo $_POST['usu'];?>
				</div>
				<div id="iruzkina">
					<?php echo $_POST['criti'];?>
				</div>

		</div>
	</div>

		<div class="criticas">
			<form role="form" method="post" action="index.php">
				Usuario: <br><input type="text" name="usu">
				<br>
			<!--Input-->
                <div class="form-group">
                    <label for="usr" style="color:#fff">Crítica</label>
                    <div class="input-group"  style="width:330px;">
                        <textarea style="border-radius: 5px;" class="form-control" rows="3" name="criti" placeholder="Crítica"></textarea>
                    </div>
                <input type="submit" value="Enviar" > 
            </form>

		</div>


	</div>


	    <!-- Pie de toda la página -->
	 <footer>

	    <img class="red" style="padding-right:170px;" href="#" src="../images/red1.png"/>
	    <img class="red" href="#" src="../../../images/red2.png"/>
	    <img class="red" href="#" src="../../images/red3.png"/>
	    <img class="red"  href="#" src="../images/red4.png"/>

	    <a href="#"> Contacto </a>
	    <a href="#"> Política de privacidad </a>
	    <a href="#"> © CopyRight 2014 </a>

	</footer> <!-- Ciere del pie de página -->

    <script type="text/javascript" src="https://code.jquery.com/jquery.js"></script> <!-- jQuery -->
    <script type="text/javascript" src="../css/dist/js/bootstrap.min.js"></script>
</body>
</html>