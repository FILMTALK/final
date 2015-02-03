<?php
// Se requiere las sesiones para los mensajes flash
if( !session_id() ) session_start();
if(!(isset($_GET['peli']) && $_GET['peli']!='')){
    header('Location: ../index.php');
}
// Requiere la clase de mensajes y se instancia el objeto de tipo Messages
require_once('../controller/class.messages.php');
$msg = new Messages();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Perfil Película</title>
	<!--para el favicon-->
    <link rel="icon" type="image/png" href="../images/favicon.png" />
	<link rel="stylesheet" type="text/css" href="../css/perfil-peli.css"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
    <!-- Controles del reproductor JavaScript-->
	<script type="text/javascript" src="../js/perfil-peli.js"></script>
    <!--Para full screen video, pantalla completa-->
    <script type="text/javascript" src="../js/fullscreenVideo.js"></script>
    <!-- Seguir pelicula AJAX -->
    <script type="text/javascript" src="../js/seguirPeli.js"></script> 
    <!-- Valorar las estrellas AJAX -->
    <script type="text/javascript" src="../js/valoracion.js"></script> 
    <!-- JavaScript para validar los campos -->
    <script type="text/javascript" src="../js/validacion.js"></script>  
    <!--CSS bootstrap-->
    <link rel="stylesheet" type="text/css" href="../css/dist/css/bootstrap.css">
    <!-- Mensajes flash -->
    <link rel="stylesheet" type="text/css" href="../css/mensajes.css">
	<!-- jQuery para menu respontive -->
    <script type="text/javascript" src="../js/menu.js"></script>
    <!-- Script para NewRelic -->          
    <script type="text/javascript">
    window.NREUM||(NREUM={}),__nr_require=function(t,e,n){function r(n){if(!e[n]){var o=e[n]={exports:{}};t[n][0].call(o.exports,function(e){var o=t[n][1][e];return r(o?o:e)},o,o.exports)}return e[n].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<n.length;o++)r(n[o]);return r}({QJf3ax:[function(t,e){function n(t){function e(e,n,a){t&&t(e,n,a),a||(a={});for(var c=s(e),f=c.length,u=i(a,o,r),d=0;f>d;d++)c[d].apply(u,n);return u}function a(t,e){f[t]=s(t).concat(e)}function s(t){return f[t]||[]}function c(){return n(e)}var f={};return{on:a,emit:e,create:c,listeners:s,_events:f}}function r(){return{}}var o="nr@context",i=t("gos");e.exports=n()},{gos:"7eSDFh"}],ee:[function(t,e){e.exports=t("QJf3ax")},{}],3:[function(t){function e(t,e,n,i,s){try{c?c-=1:r("err",[s||new UncaughtException(t,e,n)])}catch(f){try{r("ierr",[f,(new Date).getTime(),!0])}catch(u){}}return"function"==typeof a?a.apply(this,o(arguments)):!1}function UncaughtException(t,e,n){this.message=t||"Uncaught error with no additional information",this.sourceURL=e,this.line=n}function n(t){r("err",[t,(new Date).getTime()])}var r=t("handle"),o=t(5),i=t("ee"),a=window.onerror,s=!1,c=0;t("loader").features.err=!0,window.onerror=e,NREUM.noticeError=n;try{throw new Error}catch(f){"stack"in f&&(t(1),t(4),"addEventListener"in window&&t(2),window.XMLHttpRequest&&XMLHttpRequest.prototype&&XMLHttpRequest.prototype.addEventListener&&t(3),s=!0)}i.on("fn-start",function(){s&&(c+=1)}),i.on("fn-err",function(t,e,r){s&&(this.thrown=!0,n(r))}),i.on("fn-end",function(){s&&!this.thrown&&c>0&&(c-=1)}),i.on("internal-error",function(t){r("ierr",[t,(new Date).getTime(),!0])})},{1:8,2:5,3:9,4:7,5:21,ee:"QJf3ax",handle:"D5DuLP",loader:"G9z0Bl"}],4:[function(t){function e(){}if(window.performance&&window.performance.timing&&window.performance.getEntriesByType){var n=t("ee"),r=t("handle"),o=t(2);t("loader").features.stn=!0,t(1),n.on("fn-start",function(t){var e=t[0];e instanceof Event&&(this.bstStart=Date.now())}),n.on("fn-end",function(t,e){var n=t[0];n instanceof Event&&r("bst",[n,e,this.bstStart,Date.now()])}),o.on("fn-start",function(t,e,n){this.bstStart=Date.now(),this.bstType=n}),o.on("fn-end",function(t,e){r("bstTimer",[e,this.bstStart,Date.now(),this.bstType])}),n.on("pushState-start",function(){this.time=Date.now(),this.startPath=location.pathname+location.hash}),n.on("pushState-end",function(){r("bstHist",[location.pathname+location.hash,this.startPath,this.time])}),"addEventListener"in window.performance&&(window.performance.addEventListener("webkitresourcetimingbufferfull",function(){r("bstResource",[window.performance.getEntriesByType("resource")]),window.performance.webkitClearResourceTimings()},!1),window.performance.addEventListener("resourcetimingbufferfull",function(){r("bstResource",[window.performance.getEntriesByType("resource")]),window.performance.clearResourceTimings()},!1)),document.addEventListener("scroll",e,!1),document.addEventListener("keypress",e,!1),document.addEventListener("click",e,!1)}},{1:6,2:8,ee:"QJf3ax",handle:"D5DuLP",loader:"G9z0Bl"}],5:[function(t,e){function n(t){i.inPlace(t,["addEventListener","removeEventListener"],"-",r)}function r(t){return t[1]}var o=(t(1),t("ee").create()),i=t(2)(o),a=t("gos");if(e.exports=o,n(window),"getPrototypeOf"in Object){for(var s=document;s&&!s.hasOwnProperty("addEventListener");)s=Object.getPrototypeOf(s);s&&n(s);for(var c=XMLHttpRequest.prototype;c&&!c.hasOwnProperty("addEventListener");)c=Object.getPrototypeOf(c);c&&n(c)}else XMLHttpRequest.prototype.hasOwnProperty("addEventListener")&&n(XMLHttpRequest.prototype);o.on("addEventListener-start",function(t){if(t[1]){var e=t[1];"function"==typeof e?this.wrapped=t[1]=a(e,"nr@wrapped",function(){return i(e,"fn-",null,e.name||"anonymous")}):"function"==typeof e.handleEvent&&i.inPlace(e,["handleEvent"],"fn-")}}),o.on("removeEventListener-start",function(t){var e=this.wrapped;e&&(t[1]=e)})},{1:21,2:22,ee:"QJf3ax",gos:"7eSDFh"}],6:[function(t,e){var n=(t(2),t("ee").create()),r=t(1)(n);e.exports=n,r.inPlace(window.history,["pushState"],"-")},{1:22,2:21,ee:"QJf3ax"}],7:[function(t,e){var n=(t(2),t("ee").create()),r=t(1)(n);e.exports=n,r.inPlace(window,["requestAnimationFrame","mozRequestAnimationFrame","webkitRequestAnimationFrame","msRequestAnimationFrame"],"raf-"),n.on("raf-start",function(t){t[0]=r(t[0],"fn-")})},{1:22,2:21,ee:"QJf3ax"}],8:[function(t,e){function n(t,e,n){var r=t[0];"string"==typeof r&&(r=new Function(r)),t[0]=o(r,"fn-",null,n)}var r=(t(2),t("ee").create()),o=t(1)(r);e.exports=r,o.inPlace(window,["setTimeout","setInterval","setImmediate"],"setTimer-"),r.on("setTimer-start",n)},{1:22,2:21,ee:"QJf3ax"}],9:[function(t,e){function n(){c.inPlace(this,d,"fn-")}function r(t,e){c.inPlace(e,["onreadystatechange"],"fn-")}function o(t,e){return e}var i=t("ee").create(),a=t(1),s=t(2),c=s(i),f=s(a),u=window.XMLHttpRequest,d=["onload","onerror","onabort","onloadstart","onloadend","onprogress","ontimeout"];e.exports=i,window.XMLHttpRequest=function(t){var e=new u(t);try{i.emit("new-xhr",[],e),f.inPlace(e,["addEventListener","removeEventListener"],"-",function(t,e){return e}),e.addEventListener("readystatechange",n,!1)}catch(r){try{i.emit("internal-error",[r])}catch(o){}}return e},window.XMLHttpRequest.prototype=u.prototype,c.inPlace(XMLHttpRequest.prototype,["open","send"],"-xhr-",o),i.on("send-xhr-start",r),i.on("open-xhr-start",r)},{1:5,2:22,ee:"QJf3ax"}],10:[function(t){function e(t){if("string"==typeof t&&t.length)return t.length;if("object"!=typeof t)return void 0;if("undefined"!=typeof ArrayBuffer&&t instanceof ArrayBuffer&&t.byteLength)return t.byteLength;if("undefined"!=typeof Blob&&t instanceof Blob&&t.size)return t.size;if("undefined"!=typeof FormData&&t instanceof FormData)return void 0;try{return JSON.stringify(t).length}catch(e){return void 0}}function n(t){var n=this.params,r=this.metrics;if(!this.ended){this.ended=!0;for(var i=0;c>i;i++)t.removeEventListener(s[i],this.listener,!1);if(!n.aborted){if(r.duration=(new Date).getTime()-this.startTime,4===t.readyState){n.status=t.status;var a=t.responseType,f="arraybuffer"===a||"blob"===a||"json"===a?t.response:t.responseText,u=e(f);if(u&&(r.rxSize=u),this.sameOrigin){var d=t.getResponseHeader("X-NewRelic-App-Data");d&&(n.cat=d.split(", ").pop())}}else n.status=0;r.cbTime=this.cbTime,o("xhr",[n,r,this.startTime])}}}function r(t,e){var n=i(e),r=t.params;r.host=n.hostname+":"+n.port,r.pathname=n.pathname,t.sameOrigin=n.sameOrigin}if(window.XMLHttpRequest&&XMLHttpRequest.prototype&&XMLHttpRequest.prototype.addEventListener&&!/CriOS/.test(navigator.userAgent)){t("loader").features.xhr=!0;var o=t("handle"),i=t(2),a=t("ee"),s=["load","error","abort","timeout"],c=s.length,f=t(1);t(4),t(3),a.on("new-xhr",function(){this.totalCbs=0,this.called=0,this.cbTime=0,this.end=n,this.ended=!1,this.xhrGuids={}}),a.on("open-xhr-start",function(t){this.params={method:t[0]},r(this,t[1]),this.metrics={}}),a.on("open-xhr-end",function(t,e){"loader_config"in NREUM&&"xpid"in NREUM.loader_config&&this.sameOrigin&&e.setRequestHeader("X-NewRelic-ID",NREUM.loader_config.xpid)}),a.on("send-xhr-start",function(t,n){var r=this.metrics,o=t[0],i=this;if(r&&o){var f=e(o);f&&(r.txSize=f)}this.startTime=(new Date).getTime(),this.listener=function(t){try{"abort"===t.type&&(i.params.aborted=!0),("load"!==t.type||i.called===i.totalCbs&&(i.onloadCalled||"function"!=typeof n.onload))&&i.end(n)}catch(e){try{a.emit("internal-error",[e])}catch(r){}}};for(var u=0;c>u;u++)n.addEventListener(s[u],this.listener,!1)}),a.on("xhr-cb-time",function(t,e,n){this.cbTime+=t,e?this.onloadCalled=!0:this.called+=1,this.called!==this.totalCbs||!this.onloadCalled&&"function"==typeof n.onload||this.end(n)}),a.on("xhr-load-added",function(t,e){var n=""+f(t)+!!e;this.xhrGuids&&!this.xhrGuids[n]&&(this.xhrGuids[n]=!0,this.totalCbs+=1)}),a.on("xhr-load-removed",function(t,e){var n=""+f(t)+!!e;this.xhrGuids&&this.xhrGuids[n]&&(delete this.xhrGuids[n],this.totalCbs-=1)}),a.on("addEventListener-end",function(t,e){e instanceof XMLHttpRequest&&"load"===t[0]&&a.emit("xhr-load-added",[t[1],t[2]],e)}),a.on("removeEventListener-end",function(t,e){e instanceof XMLHttpRequest&&"load"===t[0]&&a.emit("xhr-load-removed",[t[1],t[2]],e)}),a.on("fn-start",function(t,e,n){e instanceof XMLHttpRequest&&("onload"===n&&(this.onload=!0),("load"===(t[0]&&t[0].type)||this.onload)&&(this.xhrCbStart=(new Date).getTime()))}),a.on("fn-end",function(t,e){this.xhrCbStart&&a.emit("xhr-cb-time",[(new Date).getTime()-this.xhrCbStart,this.onload,e],e)})}},{1:"XL7HBI",2:11,3:9,4:5,ee:"QJf3ax",handle:"D5DuLP",loader:"G9z0Bl"}],11:[function(t,e){e.exports=function(t){var e=document.createElement("a"),n=window.location,r={};e.href=t,r.port=e.port;var o=e.href.split("://");return!r.port&&o[1]&&(r.port=o[1].split("/")[0].split("@").pop().split(":")[1]),r.port&&"0"!==r.port||(r.port="https"===o[0]?"443":"80"),r.hostname=e.hostname||n.hostname,r.pathname=e.pathname,r.protocol=o[0],"/"!==r.pathname.charAt(0)&&(r.pathname="/"+r.pathname),r.sameOrigin=!e.hostname||e.hostname===document.domain&&e.port===n.port&&e.protocol===n.protocol,r}},{}],gos:[function(t,e){e.exports=t("7eSDFh")},{}],"7eSDFh":[function(t,e){function n(t,e,n){if(r.call(t,e))return t[e];var o=n();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(t,e,{value:o,writable:!0,enumerable:!1}),o}catch(i){}return t[e]=o,o}var r=Object.prototype.hasOwnProperty;e.exports=n},{}],D5DuLP:[function(t,e){function n(t,e,n){return r.listeners(t).length?r.emit(t,e,n):(o[t]||(o[t]=[]),void o[t].push(e))}var r=t("ee").create(),o={};e.exports=n,n.ee=r,r.q=o},{ee:"QJf3ax"}],handle:[function(t,e){e.exports=t("D5DuLP")},{}],XL7HBI:[function(t,e){function n(t){var e=typeof t;return!t||"object"!==e&&"function"!==e?-1:t===window?0:i(t,o,function(){return r++})}var r=1,o="nr@id",i=t("gos");e.exports=n},{gos:"7eSDFh"}],id:[function(t,e){e.exports=t("XL7HBI")},{}],loader:[function(t,e){e.exports=t("G9z0Bl")},{}],G9z0Bl:[function(t,e){function n(){var t=l.info=NREUM.info;if(t&&t.licenseKey&&t.applicationID&&f&&f.body){s(h,function(e,n){e in t||(t[e]=n)}),l.proto="https"===p.split(":")[0]||t.sslForHttp?"https://":"http://",a("mark",["onload",i()]);var e=f.createElement("script");e.src=l.proto+t.agent,f.body.appendChild(e)}}function r(){"complete"===f.readyState&&o()}function o(){a("mark",["domContent",i()])}function i(){return(new Date).getTime()}var a=t("handle"),s=t(1),c=window,f=c.document,u="addEventListener",d="attachEvent",p=(""+location).split("?")[0],h={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-515.min.js"},l=e.exports={offset:i(),origin:p,features:{}};f[u]?(f[u]("DOMContentLoaded",o,!1),c[u]("load",n,!1)):(f[d]("onreadystatechange",r),c[d]("onload",n)),a("mark",["firstbyte",i()])},{1:20,handle:"D5DuLP"}],20:[function(t,e){function n(t,e){var n=[],o="",i=0;for(o in t)r.call(t,o)&&(n[i]=e(o,t[o]),i+=1);return n}var r=Object.prototype.hasOwnProperty;e.exports=n},{}],21:[function(t,e){function n(t,e,n){e||(e=0),"undefined"==typeof n&&(n=t?t.length:0);for(var r=-1,o=n-e||0,i=Array(0>o?0:o);++r<o;)i[r]=t[e+r];return i}e.exports=n},{}],22:[function(t,e){function n(t){return!(t&&"function"==typeof t&&t.apply&&!t[i])}var r=t("ee"),o=t(1),i="nr@wrapper",a=Object.prototype.hasOwnProperty;e.exports=function(t){function e(t,e,r,a){function nrWrapper(){var n,i,s,f;try{i=this,n=o(arguments),s=r&&r(n,i)||{}}catch(d){u([d,"",[n,i,a],s])}c(e+"start",[n,i,a],s);try{return f=t.apply(i,n)}catch(p){throw c(e+"err",[n,i,p],s),p}finally{c(e+"end",[n,i,f],s)}}return n(t)?t:(e||(e=""),nrWrapper[i]=!0,f(t,nrWrapper),nrWrapper)}function s(t,r,o,i){o||(o="");var a,s,c,f="-"===o.charAt(0);for(c=0;c<r.length;c++)s=r[c],a=t[s],n(a)||(t[s]=e(a,f?s+o:o,i,s,t))}function c(e,n,r){try{t.emit(e,n,r)}catch(o){u([o,e,n,r])}}function f(t,e){if(Object.defineProperty&&Object.keys)try{var n=Object.keys(t);return n.forEach(function(n){Object.defineProperty(e,n,{get:function(){return t[n]},set:function(e){return t[n]=e,e}})}),e}catch(r){u([r])}for(var o in t)a.call(t,o)&&(e[o]=t[o]);return e}function u(e){try{t.emit("internal-error",e)}catch(n){}}return t||(t=r),e.inPlace=s,e.flag=i,e}},{1:21,ee:"QJf3ax"}]},{},["G9z0Bl",3,10,4]);
    ;NREUM.info={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",licenseKey:"81b26b8262",applicationID:"5182825",sa:1,agent:"js-agent.newrelic.com/nr-515.min.js"}
    </script> 
</head>
<body>
    <!-- Contenedor para englobar las etiquetas -->
    <div id="contene">    
        <!-- Encabezado de toda la página -->
        <?php include("../includes/header.html"); ?>
        <!-- Reproductor de video -->
        <video autoplay id="bgvid" loop>
            <?php
                include_once("../config/database.php");
                include_once("../funciones/peliculas.php");
                echo "<link href=\"../css/perfil-peli.css\" rel=\"stylesheet\" type=\"text/css\" >";
                // Se establece la colección
                $collection=$bd->peliculas;
                // Se obtiene la id de la película pasando el parámetro de la peli
                $id_pelicula=obtenerIdPelicula($_GET['peli']);
                // Se establece la variable de sesión id_pelicula
                $_SESSION['id_pelicula']=$id_pelicula;
                // Se obtienen todos los datos de la pelicula
                $pelicula=obtenerDatosPelicula($_SESSION['id_pelicula']);
                // Se recorre el array de pelicula
                foreach ($pelicula as $campo => $valor) {

                    $url;

                    if($campo=="trailer"){

                        $url=$valor;
                        // Se muestra el vídeo mediante la URL del Dropbox.
                        echo "<source src='$url'></source>";

                    }              
                } // Cierre del foreach
            ?>
        </video>

    	<!--Ventana Modal del Log In-->
        <?php include("../includes/ventanaModalLogin.html"); ?>

        <!--Ventana Modal del Sign In-->
        <?php include("../includes/ventanaModalSignin.html"); ?>

        <!-- Información sobre la película -->
    	<div id="infopeli">
            <?php
                // Se obtiene el titulo de la película mediante el método GET.
                $titulo = $_GET['peli'];
                echo "<h1> $titulo </h1>";
            ?>      

    		<!-- Voto de estrellas -->
            <div id="<?php echo htmlspecialchars($_SESSION['id_pelicula']); ?>" class="ec-stars-wrapper votacion">
                <?php if($_SESSION['id_usuario']!=''): ?>
                <a href="#" id="<?php echo htmlspecialchars($_SESSION['id_pelicula']); ?>" class="estrellasValoracion" value="1" name="<?php echo htmlspecialchars($_SESSION['id_usuario']); ?>" title="Votar con 1 estrellas">&#9733;</a>
                <a href="#" id="<?php echo htmlspecialchars($_SESSION['id_pelicula']); ?>" class="estrellasValoracion" value="2" name="<?php echo htmlspecialchars($_SESSION['id_usuario']); ?>" title="Votar con 2 estrellas">&#9733;</a>
                <a href="#" id="<?php echo htmlspecialchars($_SESSION['id_pelicula']); ?>" class="estrellasValoracion" value="3" name="<?php echo htmlspecialchars($_SESSION['id_usuario']); ?>" title="Votar con 3 estrellas">&#9733;</a>
                <a href="#" id="<?php echo htmlspecialchars($_SESSION['id_pelicula']); ?>" class="estrellasValoracion" value="4" name="<?php echo htmlspecialchars($_SESSION['id_usuario']); ?>" title="Votar con 4 estrellas">&#9733;</a>
                <a href="#" id="<?php echo htmlspecialchars($_SESSION['id_pelicula']); ?>" class="estrellasValoracion" value="5" name="<?php echo htmlspecialchars($_SESSION['id_usuario']); ?>" title="Votar con 5 estrellas">&#9733;</a>
                <?php endif; ?>
            </div>
            <!-- Nota y media de la película -->
            <div id="estrella">
                <?php include_once("../includes/valoracion.php"); ?>
            </div>
            <!-- Mensaje cuando ya has votado -->
            <div id="limitar"></div>

            <!-- Sinopsis de la película -->
            <?php 
                // Se establece la colección
                $collection=$bd->peliculas;
                // Es un array de datos sobre la película consultada en la bd
                $datosPelicula=obtenerDatosPelicula($_SESSION['id_pelicula']);

                foreach ($datosPelicula as $campo => $valor) {

                    $synopsis;

                    if($campo=="synopsis"){

                        $synopsis=$valor;
                        echo "<p>$synopsis</p>";
                    }             
                } // Cierre de foreach

            ?>

            <!-- Botón para seguir una película -->
            <div id="botonSeg">
                <?php if($_SESSION['id_usuario']!=''):
                    include_once("../includes/seguirPeli.php");
                endif; ?>
            </div>

            <!-- Botones para el vídeo -->
            <div id="buttons">
                <img src="../images/video/pause.png" id="playButton" onclick="doFirst()" />
            </div>
            <div id="amplia">
                <span class="glyphicon glyphicon-fullscreen" style="font-size:27px;"></span>
            </div>
            <!-- Cierre de los botones del vídeo -->

    	</div> <!-- Cierre del id infopeli -->

        <!-- Boton hacia abajo -->
    	<div id="div_abajo">
            <a href="#miancla"><center><span class="glyphicon-refresh-animate"><img src="../images/flecha-abajo.png"></span></center></a>
        </div> <!-- Cierre del btn_abajo -->

        <!-- Parte de las críticas -->
        <a name="miancla"></a>
    	<div id="contCriticas">

        	<div class="criticas">
                <h2>Críticas</h2></br></br>
                <!-- Críticas de los usuarios -->
                <div id="coment">                
                    <!-- Listado de los comentarios de la película obtenida de la BD -->
                    <?php
                        include_once("../includes/criticas.php");
                        // Muestra el mensaje flash
                        echo $msg->display();                    
                    ?>
                    <div id="noVacia"></div>
                </div>

                <!-- Si el usuario no está logueado no podrá comentar la película -->
                <?php

                    if(!(isset($_SESSION['id_usuario']) && $_SESSION['id_usuario']!='')){

                ?> 
                <!-- Mensaje de aviso si el usuario no está logueado -->
                <div id="warning">
                    <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
                    <span class="sr-only">Warning:</span>
                    ¡Debes estar logueado para poder comentar!
                </div>
                <!-- Textarea deshabilitado -->
                <form class="formulario" role="form" method="post">
                    <div class="form-group">
                        <div class="input-group" id="texti">
                            <textarea id="estilotextarea" class="form-control" rows="2" placeholder="Crítica" disabled></textarea>
                        </div>
                    </div>
                    <button type="submit" id="diferente" class="btn btn-primary" style="background:#66cccc;border:none;margin-bottom:150px;" disabled>
                        <span class="glyphicon glyphicon-comment"></span> Comenta</button>
                </form>

                <!-- El usuario logueado puede comentar -->
                <?php
                    }
                    else{ 
                        $id_usuario=$_SESSION['id_usuario']; // Se obtiene la variable de sesión
                        ?>
                        <!--Input para comentar la película -->
                        <form class="formulario" role="form" method="post">
                            <div class="form-group">
                                <div class="input-group"  id="texti">
                                    <textarea class="form-control" rows="2" name="<?php echo htmlspecialchars($_SESSION['id_usuario']); ?>"
                                     id="critica" placeholder="Crítica" required></textarea>
                                </div>
                            </div>
                            <button type="submit" id="enviarCritica" class="btn btn-primary" style="background:#66cccc;border:none;margin-bottom:150px;" name="<?php echo htmlspecialchars($_SESSION['id_pelicula']); ?>">
                                <span class="glyphicon glyphicon-comment"></span> Comenta</button>
                        </form>
                <?php
                    }
                ?>

    		</div> <!-- Cierre del div de críticas -->
        </div> <!-- Cierre del div de contCríticas -->
    </div> <!-- Cierre del container -->   

    <!-- Para las ventanas modales -->
    <script type="text/javascript" src="https://code.jquery.com/jquery.js"></script> <!-- jQuery -->
    <script type="text/javascript" src="../css/dist/js/bootstrap.min.js"></script>    
</body>
</html>