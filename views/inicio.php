<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">

	<!-- Cabecera de toda la página -->
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title> filmdate </title>
		<link rel="stylesheet" href="../public/css/main.css" /> <!-- El diseño está en un archivo externo -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script> <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
        <script type="text/javascript" src="../public/js/slider.js"></script> <!-- jQuery slider -->
        <!--CSS bootstrap-->
        <link rel="stylesheet" type="text/css" href="../public/css/dist/css/bootstrap.css">
        

         <!-- jQuery para ocultar el slider -->
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

                        <img id="logoTxiki" href="/inicio" src="../public/images/logotxiki.png" />
                        <!-- Botón del menú -->
                        <a href="#" id="pull"><img src="../public/images/nav-icon.png" /></a>
                       

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

            <!-- Representa el slider-->
            <div class="slider">  

                <!-- jQuery handles to place the header background images -->
                <div id="headerimgs">

                    <div id="headerimg1" class="headerimg"></div>
                    <div id="headerimg2" class="headerimg"></div>

                </div> <!-- Cierre de headerimgs -->

                <!-- Slideshow controls -->
                <div id="headernav-outer">

                    <!-- Botones de navegador -->
                    <div id="headernav">

                        <div id="back" class="btn"></div>
                        <div id="next" class="btn"></div>

                    </div> <!-- Cierre de nav -->

                </div> <!-- Cierre de los controles del slideshow -->

            </div> <!-- Cierre del slider -->



            <!-- Representa el apartado de Cartelera -->
            <section id="cartelera">
                <!-- Boton para ir hacia abajo -->
                <div id="div_abajo">
                    <center><span style="font-size:20px;color:grey;" class="glyphicon glyphicon-chevron-down glyphicon-refresh-animate"></span></center>
                 </div> <!-- Cierre del btn_abajo -->

                <h3> Cartelera </h3>

                <div class="peli">
                    <img href="#" src="../public/images/peli1.jpg"/>
                    <div class="descrip">
                        <h4>Titulo One</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt .</p>
                    </div>
                </div>
                <div class="peli">
                    <img href="#" src="../public/images/peli2.jpg"/>
                    <div class="descrip">
                        <h4>Titulo One</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt .</p>
                    </div>
                </div>
                <div class="peli">
                    <img href="#" src="../public/images/peli3.jpg"/>
                    <div class="descrip">
                        <h4>Titulo One</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt .</p>
                    </div>
                </div>
                <div class="peli">
                    <img href="#" src="../public/images/peli4.jpg"/>
                    <div class="descrip">
                        <h4>Titulo One</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt .</p>
                    </div>
                </div>
                <div class="peli">
                    <img href="#" src="../public/images/peli5.jpg"/>
                    <div class="descrip">
                        <h4>Titulo One</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt .</p>
                    </div>
                </div>
                <div class="vermas">
                    <span class="glyphicon glyphicon-plus"</span>
                </div>

                


            </section> <!--Cierre de la Cartelera -->

            <!-- Representa el apartado de Próximamente -->
            <section id="proximamente">

                <h3> Próximamente </h3>

                <div class="peli">
                    <img href="#" src="../public/images/peli1.jpg"/>
                    <div class="descrip">
                        <h4>Titulo One</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt .</p>
                    </div>
                </div>
                <div class="peli">
                    <img href="#" src="../public/images/peli2.jpg"/>
                    <div class="descrip">
                        <h4>Titulo One</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt .</p>
                    </div>
                </div>
                <div class="peli">
                    <img href="#" src="../public/images/peli3.jpg"/>
                    <div class="descrip">
                        <h4>Titulo One</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt .</p>
                    </div>
                </div>
                <div class="peli">
                    <img href="#" src="../public/images/peli4.jpg"/>
                    <div class="descrip">
                        <h4>Titulo One</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt .</p>
                    </div>
                </div>
                <div class="peli">
                    <img href="#" src="../public/images/peli5.jpg"/>
                    <div class="descrip">
                        <h4>Titulo One</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt .</p>
                    </div>
                </div>
                <div class="vermas">
                    <span class="glyphicon glyphicon-plus"</span>
                </div>


            </section> <!--Cierre de la Próximamente -->

            <!-- Pie de toda la página -->
             <footer>

                <img class="red" style="padding-right:170px;" href="#" src="../public/images/red1.png"/>
                <img class="red" href="#" src="../public/images/red2.png"/>
                <img class="red" href="#" src="../public/images/red3.png"/>
                <img class="red"  href="#" src="../public/images/red4.png"/>

                <a href="#"> Contacto </a>
                <a href="#"> Política de privacidad </a>
                <a href="#"> © CopyRight 2014 </a>

			</footer> <!-- Ciere del pie de página -->


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
                                                <button type="submit" name="login" class="btn btn-primary" style="background:#00B8E6;border:none;"><span class="glyphicon glyphicon-lock"></span> Logueate</button>
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
                                                <button type="submit" name="registro" class="btn btn-primary" style="background:#00B8E6;border:none;"><span class="glyphicon glyphicon-lock"></span>Registrarte</button>
                                                <p><br/></p>
                                            </form>
                                        </div>      
                            </div>
                        </div>

                    </div>
                </div>
            </div>

             
         <div> <!-- Cierre div del container -->

        <script type="text/javascript" src="https://code.jquery.com/jquery.js"></script> <!-- jQuery -->
        <script type="text/javascript" src="../public/css/dist/js/bootstrap.min.js"></script>

	</body>
	
</html>