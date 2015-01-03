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
        <style type="text/css">

                .contenido{
                    text-align: center;
                    margin-top: 250px;
                }
                .contenido p{
                    color: #fff;
                    font-size: 18px;
                }
                .contenido h2{
                    color: #fff;
                    font-size: 32px;
                }

        </style>
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
                    <a href="admin.php" class="navbar-brand">filmdate</a>
                </div>

                <div class="collapse navbar-collapse" id="acolapsar">
                    <ul class="nav navbar-nav">
                        <li><a href="#"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
                        <li class="dropdown">
                        <!--Seccion Desplegable-->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Usuarios <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="anadir.html">Añadir</a></li>
                                <li><a href="listar.html">Listar</a></li>
                                <li><a href="borrar.php">Borrar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                        <!--Seccion Desplegable2-->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-film"></span> Peliculas <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="anadir.html">Añadir</a></li>
                                <li><a href="listar.html">Listar</a></li>
                                <li><a href="borrar.php">Borrar</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div>
                    <!--Buscador-->
                    <form action="./" class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Buscar pelicula">
                        </div>
                        <button class="btn btn-default">Enviar</button>
                    </form>
                </div>
                </div>
            </div>
        </nav>

        <!--PARA CUANDO CLICKE UNA FILA
        $('.table > tr').click(function() {
            // row was clicked
        });-->  

        <div class="container" style="position:relative;top:50px;">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background:#4D4D4D;border:none;">Películas</div>
                <table class="table table-striped table-hover table-bordered">
                    
                    <tr class="info">
                     <th>Título</th>
                     <th>Duración</th>
                     <th>Descripción</th>
                     <th>Reparto</th>
                     <th>Calificación</th>
                    </tr>
                <?php

                    include_once("../config/database.php");
                    // Establecemos la colección
                    $collection=$bd->peliculas;

                    $pelis=$collection->find(array());

                    foreach ($pelis as $campo => $valor) {

                        echo "<tr>";

                        foreach ($valor as $movie => $dato) {

                            $titulo;
                            $descripcion;
                            $runtime;

                            if($movie=="title"){

                                $titulo=$dato;
                                echo "<th>" . $titulo . "</th>";

                            }

                            if($movie=="synopsis"){

                                $descripcion=$dato;
                                echo "<th><p align='justify'>" . $descripcion . "</p></th>";
                            }

                            if($movie=="runtime"){

                                $runtime=$dato;
                                echo "<th>" . $runtime . " mins</th>";
                            }

                           /* echo "<th>Duracsdfsdión</th>
                                     <th>sdfsd</th>
                                     <th>fsdfsd</th>";*/
                        }

                        echo "</tr>";
                    }

                ?>    <!-- 
                    
                     <th>sdff</th>
                     <th>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                     tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                     quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                     consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                     cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                     proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</th>
                    

                    <tr>
                     <th>fsdf</th>
                     <th>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                     tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                     quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                     consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                     cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                     proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</th>
                     <th>Durasfdsdción</th>
                     <th>sdf</th>
                     <th>fdsfsdfds</th>
                    </tr>

                    <tr>
                     <th>Títufsdfsdflo</th>
                     <th>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                     tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                     quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                     consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                     cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                     proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</th>
                     <th>sdf</th>
                     <th>sdf</th>
                     <th>sdfsd</th>
                    </tr> -->

                </table>
            </div>
            <button name="borrar" type="submit" class="btn btn-primary" style="width:120px;background-color:#00B8E6;border:none;outline: none;"><span class="glyphicon glyphicon-minus"></span> Borrar</button>
                <p><br/>
        </div>
            
        <script type="text/javascript" src="https://code.jquery.com/jquery.js"></script> <!-- jQuery -->
        <script type="text/javascript" src="../css/dist/js/bootstrap.min.js"></script>
	</body>
	
</html>