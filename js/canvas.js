$(document).ready(function() {

	// Se obtiene la imagen seleccionada
	var subirImagen = document.getElementById('subirImagen');
	subirImagen.addEventListener('change', dibujarImagen, false);
	// Se obtiene la id de la etiqueta canvas
	var canvas = document.getElementById('areaCanvas');
	// Se establece que el dibujo va a ser de 2 dimensiones
	var dibujo = canvas.getContext('2d');
	var imagen;

	function dibujarImagen(e){

		// Se crea un objeto de tipo FileReader
		var fichero = new FileReader();
		//Cuando el fichero ha sido seleccionado
		fichero.onload = function(event){

			//Se crea el objeto Imagen
			imagen = new Image();
			// Al cargar la imagen se realizan las siguientes instrucciones
			imagen.onload = function(){

				// Si la anchura y la altura se exceden de 150px
				if(imagen.width > 150 || imagen.height > 150){
	        		// Saca un aviso por pantalla
	        		alert("La imagen debe ser de 150x150 px.");

	       		}
	       		else{

					// Se establece la anchura de canvas respecto a la imagen
					canvas.width = imagen.width;
					// Se establece la altura de canvas respecto a la imagen
					canvas.height = imagen.height;
					// Se dibuja la imagen
					dibujo.drawImage(imagen,0,0);
				}
			}
			//coge desde local el archivo
	       imagen.src = event.target.result;
		}
		fichero.readAsDataURL(e.target.files[0]);
	}

	// Cuando le de al botón se cambia a escala de grises
	$("#bnw").click(function() {

		// Se obtiene la id de la etiqueta canvas
		var canvas = document.getElementById('areaCanvas');
		// Se establece que el dibujo va a ser de 2 dimensiones
		var dibujo = canvas.getContext('2d');
		// Se dibuja la imagen
		dibujo.drawImage(imagen,0,0);
		// Se establece la alutra y la anchura al dibujo respecto a la imagen
		var imgd = dibujo.getImageData(0, 0, imagen.width, imagen.height);
		// Se obtienen los pixeles de la imagen
		var pixeles = imgd.data;
		// Se recorren todos los pixeles
		for (var i = 0, n = pixeles.length; i < n; i += 4) {
	        var grayscale = pixeles[i] * .3 + pixeles[i+1] * .59 + pixeles[i+2] * .11;
	        // Se establecen los colores
	        pixeles[i] = grayscale;   // red
	        pixeles[i+1] = grayscale;   // green
	        pixeles[i+2] = grayscale;   // blue
	      
	    }
	    // Se dibuja los pixeles en escala de grises
	    dibujo.putImageData(imgd, 0, 0);

	});

	// Cuando le de al botón se cambia de color
	$("#colour").click(function() {

		// Se obtiene la id de la etiqueta canvas
		var canvas = document.getElementById('areaCanvas');
		// Se establece que el dibujo va a ser de 2 dimensiones
		var dibujo = canvas.getContext('2d');
		// Se dibuja la imagen
		dibujo.drawImage(imagen,0,0);
		// Se establece la alutra y la anchura al dibujo respecto a la imagen
		var imgd = dibujo.getImageData(0, 0, imagen.width, imagen.height);
		// Se obtienen los pixeles de la imagen
		var pixeles = imgd.data;
		// Se recorren todos los pixeles
		for (var i = 0, n = pixeles.length; i < n; i += 4) {
			
			          // red
          data[i] = 255 - data[i];
          // green
          data[i + 1] = 255 - data[i + 1];
          // blue
          data[i + 2] = 255 - data[i + 2];
	      
	    }
	    // Se dibuja los pixeles en escala de grises
	    dibujo.putImageData(imgd, 0, 0);

	});
});