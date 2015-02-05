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

    //Cuando la ventana se hace más pequeño, se realiza la siguiente función
    $(window).resize(function(){
      //Gaurdamos en una variable el width de la ventana de forma local
      var w=$(window).width();
      //Si la anchura es mayor que 700px, el slider debe aparecer
      if(w>1350) {
        //hacemos el video mas granbde para resoluciones mas grandes
        $('video').css("height","1000px");
        $('video').css("top","-200px");
      }

      if(w<=1350) {
      	//hacemos el video pequeño para resolucion  pequeño
        $('video').css("height","760px");
        $('video').css("top","-90px");
      }
    //Cierre de la función resize
    }); 


});