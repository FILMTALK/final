// Velocidad del cambio de imagen automatico
var slideshowSpeed = 10000;

// array que contiene las imagenes
var photos = [ {
		"image" : "slider5.jpg",
	}, {
		"image" : "slider2.jpg",
	}, {
		"image" : "slider1.jpg",
	}, {
		"image" : "slider4.jpg",
	}, {
		"image" : "slider3.jpg",
	}
];


/* Funciones jQuery ******************************* */
$(document).ready(function() {
	// Cuando haga clic en el div con el id back
	$("#back").click(function() {
		// navegacion hacia atras en el carrusel
		navigate("back");

	});	
	
	// Cuando haga clic en el div con el id next
	$("#next").click(function() {
		// navegacion hacia adelante en el carrusel
		navigate("next");

	});

	// Variables locales
	var activeContainer = 1;	
	var currentImg = 0;
	var animating = false;

	// Función para navegar dependiendo de la dirección
	var navigate = function(direction) {
		// Mira si la animacion esta ejecutandose, si es asi impide la accion
		if(animating) {
			return;
		}		
		// comprueba que imagen necesita mostrar
		if(direction == "next") {

			currentImg++;

			if(currentImg == photos.length + 1){

				currentImg = 1;
			}
		}
		else{

			currentImg--;

			if(currentImg == 0){

				currentImg = photos.length;
			}
		}		
		// comprueba que contenedor necesita mostrar
		var currentContainer = activeContainer;

		if(activeContainer == 1){

			activeContainer = 2;

		}
		else{

			activeContainer = 1;
		}
		
		showImage(photos[currentImg - 1], currentContainer, activeContainer);
		
	}; // Cierre de la función navigate
	
	var currentZindex = -1;
	var showImage = function(photoObject, currentContainer, activeContainer){

		animating = true;
		
		// comprueba que el nuevo container este siempre en el fondo
		currentZindex--;
		
		//cambia la imagen de fondo con el nuevo contenedor activo
		$("#headerimg" + activeContainer).css({

			"background-image" : "url(../images/" + photoObject.image + ")",
			"display" : "block",
			"z-index" : currentZindex

		});
		
		// Desaparece el container actual
		$("#headerimg" + currentContainer).fadeOut(function() {

			setTimeout(function() {
				animating = false;
			}, 500);
			
		});
	};

	
	// establecer la primera imagen
	navigate("next");
	
	// Comenzar la animacion
	interval = setInterval(function() {
		navigate("next");
	}, slideshowSpeed);
	
});