//declaracion de variables globales
var myMovie;
var playButton;

//empieza por aqui, le pasamo un numero desde el html (onclick="doFirst(2)" por ejemplo) para los diferentes videos
function doFirst(){
	myMovie = document.getElementById('bgvid');
	playButton = document.getElementById('playButton');

	playOrPause();
}

//reproducir o parar
function playOrPause(){
	myMovie.classList.toggle("stopfade");
	if(!myMovie.paused && !myMovie.ended)
	{
		myMovie.pause();
		playButton.src="../images/video/play.png";//PARA CAMBIAR LA IMAGEN DEL PLAY
	}else{
		myMovie.play();
		playButton.src="../images/video/pause.png";//PARA CAMBIAR LA IMAGEN DEL PLAY
	}
}

function vidFade() {	
  myMovie.classList.add("stopfade");
}