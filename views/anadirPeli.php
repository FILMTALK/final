<?php
// Se requiere las sesiones para los mensajes flash
if( !session_id() ) session_start();
/*if(!(isset($_SESSION['id_usuario']) && $_SESSION['id_usuario']!='' && $_SESSION['id_usuario']=='54b39057721880ef1d8b4568')){
    // Redirecciona a la página principal si no es administrador
    header('Location: ../index.php');
}*/
if(!(isset($_SESSION['id_usuario']) && $_SESSION['id_usuario']!='' && $_SESSION['id_usuario']=='5624b7798351ef4a39fae266')){
    // Redirecciona a la página principal si no es administrador
    header('Location: ../index.php');
}
// Se importa la clase de mensajes y se instancia
require_once('../controller/class.messages.php');
$msg = new Messages();
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
        <!-- Mensajes flash -->
        <link rel="stylesheet" type="text/css" href="../css/mensajes.css">
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
                    <a href="/index.php" class="navbar-brand">filmdate</a>
                </div>

                <!-- Elementos del menú -->
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
                  
                        <button class="btn btn-default" style="margin-top:8px;" onclick="location.href='salir.php'"><span class="glyphicon glyphicon-off"></span></button>  
                    </div>
                </div>
            </div>
        </nav>

        <!--Formulario-->
        <div class="container">
            <?php        
                // Muestra el mensaje flash
                echo $msg->display();
            ?>
            <!-- Añadir pelicula -->
            <div style="position:relative;top:30px;left:20px;">
                <form method="post" role="form" action="../model/anadirPeli.php">
                <!--Input titulo -->
                    <div class="form-group">
                        <label for="usr" style="color:#fff;text-align: left;">Titulo de la película</label>
                        <div class="input-group"  style="width:330px;">
                            <input  style="border-radius: 5px;" type="text" class="form-control" id="usr" placeholder="Nombre" name="nombre" required>
                        </div>
                    </div>
                    <br/>
                <!--Input descripcion -->
                    <div class="form-group">
                        <label for="usr" style="color:#fff">Descripción</label>
                        <div class="input-group"  style="width:330px;">
                            <textarea style="border-radius: 5px;" class="form-control" rows="3"  placeholder="Descripción" name="descripcion" required></textarea>
                        </div>
                    </div>
                    <br/>
                <!--Input duracion -->
                    <div class="form-group">
                        <label for="usr" style="color:#fff">Duración</label>
                        <div class="input-group"  style="width:330px;">
                            <input  style="border-radius: 5px;" type="text" class="form-control" id="usr" placeholder="Duración" name="duracion" required>
                        </div>
                    </div>
                    <br/>
                <!--Input reparto-->
                    <div class="form-group">
                        <label for="usr" style="color:#fff">Reparto</label>
                        <div class="input-group"  style="width:330px;">
                            <input  style="border-radius: 5px;" type="text" class="form-control" id="usr" placeholder="Reparto" name="reparto" required>
                        </div>
                    </div>
                    <br/>

                    <button name="anadir" type="submit" class="btn btn-primary" style="width:120px;background-color:#00B8E6;border:none;outline: none;"><span class="glyphicon glyphicon-plus"></span> Añadir</button>
                    <br/>
                </form>
            </div>
        </div>
            
        <script type="text/javascript" src="https://code.jquery.com/jquery.js"></script> <!-- jQuery -->
        <script type="text/javascript" src="../css/dist/js/bootstrap.min.js"></script>
	</body>	
</html>