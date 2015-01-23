<?php

//------------------------------------------------------------------------------
// A session is required for the messages to work
//------------------------------------------------------------------------------
if( !session_id() ) session_start();
if(!(isset($_SESSION['id_usuario']) && $_SESSION['id_usuario']!='')){
    header('Location: ../index.php');
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">

	<!-- Cabecera de toda la página -->
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title> filmdate </title>
        <!--para el favicon-->
        <link rel="icon" type="image/png" href="../images/favicon.png" />
        <link rel="stylesheet" type="text/css" href="../css/dist/css/bootstrap.css">

	</head>
	<body  background="../images/cine.jpg" no-repeat center center fixed>	
    <!--MENU-->
        <nav class="navbar navbar-default" role="navigation"><!--inverse en vez de default, para que sea en negro el navegador-->
            <div class="container-fluid">
                <div class="navbar-header">
                    <!--Boton para el responsive-->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#acolapsar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand">filmdate</a>
                </div>

                <div class="collapse navbar-collapse" id="acolapsar">
                    <ul class="nav navbar-nav">
                        <li><a href="admin.php"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
                        <li class="dropdown">
                        <!--Seccion Desplegable-->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Usuarios <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="anadirUser.php">Añadir</a></li>
                                <li><a href="listarUser.php">Listar</a></li>
                                <li><a href="borrarUser.php">Borrar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                        <!--Seccion Desplegable2-->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-film"></span> Peliculas <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="anadirPeli.php">Añadir</a></li>
                                <li><a href="listarPeli.php">Listar</a></li>
                                <li><a href="borrarPeli.php">Borrar</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div>
                    
                         <button class="btn btn-default" style="margin-top:8px;" onclick="location.href='salir.php'">
                         <span class="glyphicon glyphicon-off"></span></button>  
                </div>
                </div>
            </div>
        </nav>

        <div class="container" style="position:relative;top:50px;">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background:#4D4D4D;border:none;">Películas</div>
                <table class="table table-striped table-hover table-bordered">
                    
                    <tr class="info">
                     <th>Email</th>
                     <th>Usuario</th>
                     <th>Password</th>
                    </tr>
                <?php
                    include_once("../funciones/peliculas.php");
                    include_once("../config/database.php");
                    // Establecemos la colección
                    $collection=$bd->usuarios;

                    $users=$collection->find(array());

                    foreach ($users as $campo => $valor) {                  
                        echo "<tr>";
                        foreach ($valor as $user => $dato) {

                            $usuario;
                            $email;
                            $password;

                            if($user=="email"){

                                $email=$dato;
                                echo "<td>" . $email . "</td>";
                            }

                            if($user=="usuario"){

                                $usuario=$dato;
                                echo "<td>" . $usuario . "</td>";

                            }
                            if($user=="password"){

                                $password=$dato;
                                echo "<td>" . $password . "</td>";

                            }
                         
                        }
                        echo "</tr>";
                    }

                ?>  
                </table>
            </div>
        </div>
            
        <script type="text/javascript" src="https://code.jquery.com/jquery.js"></script> <!-- jQuery -->
        <script type="text/javascript" src="../css/dist/js/bootstrap.min.js"></script>
	</body>
	
</html>