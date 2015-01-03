<?php
// Se importan las funciones
include_once("../funciones/funciones.php");

// Se inicia sesión o reanuda la sesión
session_start();

// Se obtienenn los datos del usuario mediante el id
$datosUsuario=obtenerDatosUsuario($_SESSION['id_usuario']);

// Variables locales
$email;
$usuario;
$password;

// Recorremos los datos para saber si el email existe
foreach($datosUsuario as $campos => $datos){
    if($campos=='email'){
        $email=$datos;
    }
    if($campos=='usuario'){
        $usuario=$datos;
    }
    if($campos=='password'){
        $password=$datos;
    }
} // Cierre del bucle foreach

// Se establece el array de cookies (guardar la información del usuario)
setcookie("usuario[email]", $email, time()+3600);
setcookie("usuario[nombre]", $usuario, time()+3600);
setcookie("usuario[password]", $password, time()+3600);
// Se expira en 1min.*/

?>
<html>
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

	<body background="../images/cine.jpg" no-repeat center center fixed>
    <div id="container"> 
        
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

<!---------------------------tgt---------------------------------->

</div> <!-- div de Container -->
<div id="cont">

        <div class="page-wrap">

        <?php 

            // array de cookies
            if (isset($_COOKIE['usuario'])) {
                foreach ($_COOKIE['usuario'] as $name => $value) {
                    $name=htmlspecialchars($name);
                    if($name=="nombre"){
                        $value=htmlspecialchars($value);
                        echo "<h1>Perfil de $value </h1>";

                    }
                }
            }


        ?>

        <div class="profile">

            <div class="profile-avatar-wrap">
                <img src="../images/256.jpg" id="profile-avatar" alt="Image for Profile">
            </div>

            <?php

                //print(" Hola, <b>" . $_COOKIE[$cookie_name] . "<b/>");

                // Se importa database.php para mantener la conexión
                include_once("../config/database.php");

                // Se importan para utilizar las sesiones
                include_once("../model/registro.php");
                include_once("../model/login.php");


                // Si está logueado muestra los datos y el link para salir
                echo "Usuario: <b>".$_SESSION["nombreUsuario"]."</b>!\n\n\n";

                ?>

                <button class="btn btn-info" data-toggle="modal" data-target="#editNombre" 
                    style="background-color:#66cccc; color:#fff; border:none; opacity:0.7; padding-left:5px;
                    margin-right:10px;
                    outline:none;"><span class="glyphicon glyphicon-pencil"></span></button><br />

                    <?php

                        // array de cookies
                        if (isset($_COOKIE['usuario'])) {
                            foreach ($_COOKIE['usuario'] as $name => $value) {
                                $name=htmlspecialchars($name);
                                if($name=="email"){
                                    $value=htmlspecialchars($value);
                                    echo "Email: <b>$value</b>\n\n\n";

                                }
                            }
                        }

                    ?>
                <button class="btn btn-info" data-toggle="modal" data-target="#editEmail" 
                    style="background-color:#66cccc; color:#fff; border:none; opacity:0.7; 
                    padding-left:5px;margin-right:10px;
                    outline:none;"><span class="glyphicon glyphicon-pencil"></span></button>


        </div>

        <h3>Arrastra la imagen o seleccionala:</h3>
        <input type="file" id="uploader">

    </div>
<!---------------------------tgt---------------------------------->
</div>

<!--Ventana Modal del Editar nombre-->
    <div class="modal fade" id="editNombre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Cambio de nombre</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                                <div class="panel-body">
                                    <form role="form" method="post" action="../model/editarNombreUsuario.php">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nuevo nombre</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                                <input type="text" name="nombre" class="form-control" placeholder="Nuevo nombre">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Contraseña</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                                <input type="password" name="password" class="form-control" placeholder="Contraseña para verificar">
                                            </div>
                                        </div>
                                        <br/>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" class="btn btn-success" 
                                            style="font-size:16px;margin-top:8px;">
                                            <span class="glyphicon glyphicon-arrow-left"></span> Atras
                                        </button>
                                        <button type="submit" name="editNombre" class="btn btn-primary" style="background:#66cccc;border:none;">
                                            <span class="glyphicon glyphicon-user"></span> Modificar</button>
                                        <p><br/></p>
                                    </form>
                                </div>
                            
                        
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--Ventana Modal del Editar email-->
    <div class="modal fade" id="editEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Cambio de email</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                                <div class="panel-body">
                                    <form role="form" method="post" action="../model/editarEmailUsuario.php">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nuevo email</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                                <input type="email" name="email" class="form-control" placeholder="Nuevo email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Contraseña</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                                <input type="password" name="password" class="form-control" placeholder="Contraseña para verificar">
                                            </div>
                                        </div>
                                        <br/>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" class="btn btn-success" 
                                            style="font-size:16px;margin-top:8px;">
                                            <span class="glyphicon glyphicon-arrow-left"></span> Atras
                                        </button>
                                        <button type="submit" name="editEmail" class="btn btn-primary" style="background:#66cccc;border:none;">
                                            <span class="glyphicon glyphicon-user"></span> Modificar</button>
                                        <p><br/></p>
                                    </form>
                                </div>
                            
                        
                    </div>
                </div>

            </div>
        </div>
    </div>



    <!--Jquery que necesita-->
    <script src="../js/resample.js"></script>
    <script src="../js/avatar.js"></script>

    <!-- jQuery para ventana modal -->
    <script type="text/javascript" src="https://code.jquery.com/jquery.js"></script> <!-- jQuery -->
    <script type="text/javascript" src="../css/dist/js/bootstrap.min.js"></script>

    </body>

</html>