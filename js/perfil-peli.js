// Declaracion de variables globales
var myMovie;
var playButton;

// Cuando haga clic en la imagen de pause, se activa la función doFirst
function doFirst(){
    // Se obtiene el atributo id del video y del botón
	myMovie = document.getElementById('bgvid');
	playButton = document.getElementById('playButton');
    // Se realiza la función
	playOrPause();
}

// Reproduce o para el vídeo
function playOrPause(){
    // Si el vídeo se está ejecutando, elimina la clase stopfade, sino añade
	myMovie.classList.toggle("stopfade");
	// Si el vídeo no se ha pausado o detenido
	if(!myMovie.paused && !myMovie.ended){
	    // Se pausa el vídeo
		myMovie.pause();
		playButton.src="../images/video/play.png"; // cambia la imagen a play
	}else{
	    // Se inicia o reanuda el vídeo
		myMovie.play();
		playButton.src="../images/video/pause.png"; // cambia la imagen a pause
	}
}

function vidFade() {
    // Se añade la clase stopfade para detener la animación
    myMovie.classList.add("stopfade");
}