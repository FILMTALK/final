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
});