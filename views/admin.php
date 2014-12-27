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
                    <a href="#" class="navbar-brand">filmdate</a>
                </div>

                <div class="collapse navbar-collapse" id="acolapsar">
                    <ul class="nav navbar-nav">
                        <li><a href="admin.php"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
                        <li class="dropdown">
                        <!--Seccion Desplegable-->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Usuarios <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="anadir.html">Añadir</a></li>
                                <li><a href="listar.html">Listar</a></li>
                                <li><a href="borrar.html">Borrar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                        <!--Seccion Desplegable2-->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-film"></span> Peliculas <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="anadir.html">Añadir</a></li>
                                <li><a href="listar.html">Listar</a></li>
                                <li><a href="borrar.html">Borrar</a></li>
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

        <div class="contenido"> 
                 <h2> Parte Administración</h2>

                <p>En esta sección podrás Añadir, Listar y Eliminar Películas y Usuarios.</p>

        </div>   
            
        <script type="text/javascript" src="https://code.jquery.com/jquery.js"></script> <!-- jQuery -->
        <script type="text/javascript" src="../css/dist/js/bootstrap.min.js"></script>
	</body>
	
</html>