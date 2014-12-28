<html>
<!--
<?php

/* Se importa database.php para mantener la conexión
include_once("../config/database.php");

Se importan para utilizar las sesiones
include_once("../model/registro.php");
include_once("../model/login.php");

$cookie_name="usuario";
$cookie_value=$usuario;
setcookie($cookie_name, $cookie_value, time()+3600);  Se expira en 1h.*/

?> -->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">

	<!-- Cabecera de toda la página -->
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

		<title> Perfil de Usuario</title>
        <!--para el favicon-->
        <link rel="icon" type="image/png" href="../images/favicon.png" />
		<!-- El diseño está en un archivo externo -->
        <link rel="stylesheet" href="../css/main.css" /> 
		<link rel="stylesheet" href="../css/perfilUsuario.css" /> 

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 

        <!--CSS bootstrap-->
        <link rel="stylesheet" type="text/css" href="../css/dist/css/bootstrap.css">
        

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

	<body>
        <header id="header"> 
            <!-- Imagen corporativa -->
            <div id="logo">
                <a href="/index.php"><img class="imgLogo" /></a>
                <!-- Botón del menú -->
                <a href="#" id="pull"><img src="../images/nav-icon.png" /></a>
            </div> <!-- Cierre del logo -->
            <!-- Menú -->
            <nav id="menu_nav">
                <!-- Lista desordenada -->
                <ul>
                    <!-- Item 1, Cartelera --> 
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
                    <!-- <li>
                        <button class="btn btn-info" data-toggle="modal" data-target="#miregistro" 
                        style="background-color:#bebebe; border:none; opacity:0.7; padding-left:5px;margin-right:10px;
                        outline:none;">Sign in</button> 
                    </li> <!-- Cierre de la Registro 
                    <!-- Item 5, Login 
                    <li>
            
                        <button class="btn btn-info" id="btn_menu" data-toggle="modal" data-target="#milogin" 
                        style="background-color:#bebebe; border:none; opacity:0.7;outline:none;">Log in</button>  
                    </li> <!-- Cierre de la Login --> 
                    <li>
                        <?php
                            // Se importa database.php para mantener la conexión
                            require_once("../config/database.php");
                            // Se importan para utilizar las sesiones
                            require_once("../model/registro.php");
                            require_once("../model/login.php");
                            print("Hola, <b>".$_SESSION["usuario"]."</b>! <br>\n");
                        ?>
                    </li> 
                    <li>
                        <button class="btn btn-info" id="btn_menu" style="background-color:#bebebe; 
                        border:none; opacity:0.7;outline:none;" onclick="location.href='salir.php'">Salir</button>  
                    </li> <!-- Cierre de la Login -->   
                </ul> <!-- Cierre de la lista desordenada -->
            </nav> <!-- Cierre del menú -->
        </header> <!-- Cierre del encabezado -->

<!---------------------------tgt---------------------------------->

        <div class="page-wrap">

        <h1>Perfil de usuario</h1>

        <div class="profile">

            <div class="profile-avatar-wrap">
                <img src="../images/256.jpg" id="profile-avatar" alt="Image for Profile">
            </div>

            <h2>Eli Amasa Iniwo</h2>
            <div class="location">San Sebastian, CA</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur voluptatem accusantium voluptas doloremque porro temporibus aut rerum possimus cum minus.</p>

        </div>

        <h3>Arrastra la imagen o seleccionala:</h3>
        <input type="file" id="uploader">

    </div>
<!---------------------------tgt---------------------------------->
		<?php

			//print(" Hola, <b>" . $_COOKIE[$cookie_name] . "<b/>");

			// Se importa database.php para mantener la conexión
			include_once("../config/database.php");

			// Se importan para utilizar las sesiones
			include_once("../model/registro.php");
			include_once("../model/login.php");


			// Si está logueado muestra los datos y el link para salir
			print("Hola, <b>".$_SESSION["usuario"]."</b>! <br>\n");
			print("Tu contraseña es: <b>".$_SESSION["password"]."</b><br>\n");
			print("Tu email es: <b>".$_SESSION["email"]."</b><br>\n");
			print("<a href=\"salir.php"."\">Salir</a>");

		?>

    <!--Jquery que necesita-->
    <script src="../js/resample.js"></script>
    <script src="../js/avatar.js"></script>

	</body>

</html>