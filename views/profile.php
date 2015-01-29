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

if(!(isset($_SESSION['id_usuario']) && $_SESSION['id_usuario']!='')){
    header('Location: ../index.php');
}

// Se importan las funciones para comprobar u obtener datos
include_once("../funciones/peliculas.php");

?>

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
		<link rel="stylesheet" href="../css/perfilUsuario.css" />
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
        <!--CSS bootstrap-->
        <link rel="stylesheet" type="text/css" href="../css/dist/css/bootstrap.css">
        <!-- Mensajes flash -->
        <link rel="stylesheet" type="text/css" href="../css/mensajes.css">
        <!-- jQuery para menu respontive -->
        <script type="text/javascript" src="../js/menu.js"></script>
        <!--Canvas-->
        <script type="text/javascript" src="../js/canvas.js"></script>
        <!--Dejar de seguir peli-->
        <script type="text/javascript" src="../js/dejarSeguir.js"></script>    
        <!-- JavaScript para validar los campos -->
        <script type="text/javascript" src="../js/validarEditarDatos.js"></script>
        <!-- jQuery para ventana modal -->
        <script type="text/javascript" src="https://code.jquery.com/jquery.js"></script>
        <script type="text/javascript" src="../css/dist/js/bootstrap.min.js"></script>  
	</head> <!-- Cierre del encabezado de la página -->

	<body background="../images/fondoUsu.jpg" no-repeat center center fixed>
        <div id="container"> 
            
            <!-- Encabezado de toda la página -->
            <?php include("../includes/headerListaPelis.html"); ?>

        

        </div> <!-- div de Container -->

        <!---------------------------tgt---------------------------------->
        <div id="cont">

            <?php

                //------------------------------------------------------------------------
                // Mostrar el mensaje flash
                //------------------------------------------------------------------------
                echo $msg->display();

            ?>

            <div class="page-wrap">

                <?php

                    // Muestra la variable de sesión del nombreUsuario
                    if (isset($_SESSION['nombreUsuario'])) {
                               
                        echo "<h1 id='perfilTitulo'>Perfil de ". $_SESSION["nombreUsuario"] . "</h1>"; 

                    }

                ?>
                <div class="profile">

                    <div id="mostrarMsg"> </div>

                    <div class="editarDatos">

                        <?php

                            // Muestra la variable de sesión del nombreUsuario
                            if (isset($_SESSION['nombreUsuario'])) {
                                       
                                echo "<p class='infoUser'>Usuario: <b>". $_SESSION["nombreUsuario"] ."</b>";

                            }

                        ?>

                        <button class="btn btn-info" data-toggle="modal" data-target="#editNombre" 
                            style="background-color:#66cccc; color:#fff; border:none; opacity:0.7; padding-left:5px;
                            margin-right:10px;
                            outline:none;"><span class="glyphicon glyphicon-pencil"></span></button><br />

                            <?php

                                // Muestra la variable de sesión del email
                                if (isset($_SESSION['email'])) {
                                           
                                    echo "Email: <b>". $_SESSION["email"] ."</b>";

                                }

                            ?>
                        <button class="btn btn-info" data-toggle="modal" data-target="#editEmail" 
                            style="background-color:#66cccc; color:#fff; border:none; opacity:0.7; 
                            padding-left:5px;margin-right:10px;
                            outline:none;"><span class="glyphicon glyphicon-pencil"></span></button>
                        </p>

                    </div>
                    <div id="avatar">
                        <div id="recargaImagen">
                            <?php

                                include_once("../config/database.php");

                                $nombreUsuario = $_SESSION["nombreUsuario"];

                                $collection=$bd->usuarios;

                                $datos=$collection->findOne(array('usuario' => "$nombreUsuario"));

                                foreach ($datos as $key => $value) {

                                    if($key=="foto"){

                                        echo "<img id='fotoUsuario' src='".$value."' alt='Avatar'/><br /><br />";

                                    }
                                }

                            ?>
                        </div>
                        <canvas id="areaCanvas" style="width:10%;height:10%;"></canvas>
                        <div id="div_file">
                            <p id="texto">Añade una foto</p>
                            <input type="file" id="subirImagen">
                        </div>

                    </div>

                    <button id="bnw">Grayscale</button>
                    <button id="colour">Color</button><br /><br />

                    <button id="enviar" name="<?php echo htmlspecialchars($_SESSION['id_usuario']); ?>" 
                        value="<?php echo htmlspecialchars($_SESSION['nombreUsuario']); ?>"> Subir foto </button>

                </div> <!-- Cierre de la clase profile -->
                <h2 id="pelisquesigues">Películas que sigues: </h2>
                <div id="aviso"></div>
                <table id="pelisigue">
                    
                    <?php
                        include("../includes/peliSigues.php");
                    ?>

                </table>

            </div> <!--  Cierre div de la clase page-wrap -->
        </div> <!-- Cierre div de la id cont -->
        <!---------------------------tgt---------------------------------->    

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
                                            <input type="text" name="nombre" class="form-control" placeholder="Nuevo nombre" maxlength="8" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Contraseña</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                            <input type="password" name="password" class="form-control" maxlength="15" id="exampleInputPassword4" placeholder="Contraseña para verificar" required>
                                        </div>
                                    </div>
                                    <br/>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" class="btn btn-success" 
                                        style="font-size:16px;margin-top:8px;">
                                        <span class="glyphicon glyphicon-arrow-left"></span> Atras
                                    </button>
                                    <button type="submit" onClick="revisarEditarNombre();" name="editNombre" class="btn btn-primary" style="background:#66cccc;border:none;">
                                        <span class="glyphicon glyphicon-user"></span> Modificar</button>
                                    <p><br/></p>
                                </form>
                            </div>                           
                        </div>
                    </div> <!-- Cierre de la clase modal-body -->

                </div> <!-- modal-content -->
            </div>
        </div> <!-- Cierre de la Ventana Modal Editar nombre -->

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
                                            <input type="email" name="email" class="form-control" placeholder="Nuevo email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Contraseña</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                            <input type="password" name="password" class="form-control" maxlength="15" id="exampleInputPassword5" placeholder="Contraseña para verificar" required>
                                        </div>
                                    </div>
                                    <br/>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" class="btn btn-success" 
                                        style="font-size:16px;margin-top:8px;">
                                        <span class="glyphicon glyphicon-arrow-left"></span> Atras
                                    </button>
                                    <button type="submit" onClick="revisarEditarEmail();" name="editEmail" class="btn btn-primary" style="background:#66cccc;border:none;">
                                        <span class="glyphicon glyphicon-user"></span> Modificar</button>
                                    <p><br/></p>
                                </form>
                            </div>                           
                        </div>
                    </div> <!-- Cierre de la clase modal-body -->

                </div> <!-- modal-content -->
            </div>
        </div> <!-- Cierre de la Ventana Modal Editar email -->

        

    </body>

</html>