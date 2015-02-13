$(document).ready(function() {
	// Se ocultan los botones
	$("#bnw").fadeOut();
	$("#enviar").fadeOut();
	$("#colour").fadeOut();	

	// Se obtiene la imagen seleccionada
	var subirImagen = document.getElementById('subirImagen');
	subirImagen.addEventListener('change', dibujarImagen, false);
	// Se obtiene la id de la etiqueta canvas
	var canvas = document.getElementById('areaCanvas');
	// Se establece que el dibujo va a ser de 2 dimensiones
	var dibujo = canvas.getContext('2d');
	var imagen;
	var imagenSrc;

	function dibujarImagen(e){

		// Se crea un objeto de tipo FileReader
		var fichero = new FileReader();
		// Cuando el fichero ha sido seleccionado
		fichero.onload = function(event){

			// Se crea el objeto Imagen
			imagen = new Image();
			// Al cargar la imagen se realizan las siguientes instrucciones
			imagen.onload = function(){

				// Si la anchura y la altura se exceden de 150px
				if(imagen.width > 150 || imagen.height > 150){
	        		// Saca un aviso por pantalla
					$("#mostrarMsg").css("background","url(../images/messages/cross.png ) no-repeat 0px 30%");
					$("#mostrarMsg").css("background-color","#FFF0EF");
					$("#mostrarMsg").css("border","1px solid #C42608");
					$("#mostrarMsg").css("width","83%");
					$("#mostrarMsg").css("margin","0px 0px 10px 0px");
					$("#mostrarMsg").html("<p style='margin-left:20px;color:#c00 !important;width:60%;'>La imagen debe ser de 150 x 150 px.</p>");
	       		}
	       		else{
	       			// Muestra los botones
	       			$("#bnw").fadeIn();
	       			$("#enviar").fadeIn();
					$("#colour").fadeIn();
					// Eliminamos el atributo disabled de los botones
	       			$("#enviar").removeAttr("disabled");
	       			$("#bnw").removeAttr("disabled");
	       			$("#colour").removeAttr("disabled");

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
	       imagenSrc = imagen.src;

		}
		// Lee la url del fichero para mostrar la imagen
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
	        pixeles[i] = grayscale;   // rojo
	        pixeles[i+1] = grayscale; // verde
	        pixeles[i+2] = grayscale; // azul
	      
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
			
          data[i] = 255 - data[i]; 		   // rojo
          data[i + 1] = 255 - data[i + 1]; // verde
          data[i + 2] = 255 - data[i + 2]; // azul
	      
	    }
	    // Se dibuja los pixeles en color
	    dibujo.putImageData(imgd, 0, 0);

	});

	$("#enviar").click(function() {

		event.preventDefault();

		// Se obtiene el usuario y el nombre desde los atributos name y value del botón enviar
		var usuario=document.getElementById("enviar").name;
		var nombre=document.getElementById("enviar").value;

		$.ajax({

			type: "POST",
			url: "../model/canvas.php",
			data: {

	        	imgSrc : imagenSrc,
	        	id_usuario: usuario,
	        	nombreUsuario: nombre

	    	},

			// función que se ejecutará cuando obtengamos la respuesta
			success:function(data){

				dibujo.clearRect(0, 0, canvas.width, canvas.height);

		  		$('#recargaImagen').load('../includes/anadirImagen.php?nombreUsuario='+nombre);	
		  		$("#bnw").fadeOut();
				$("#enviar").fadeOut();
				$("#colour").fadeOut();	

			}


		});

	});
	
});