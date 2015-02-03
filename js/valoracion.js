$(document).ready(function() {

	$(".estrellasValoracion").click(function() {

		// Se obtienen los atributos de la estrella que hizo clic
	    var estrella=this;

		// creamos el objeto JSON para enviar a la página PHP
	   	var datosClick = {
	        clickEstrella : $(estrella).attr("value"), // le pasamos el valor de la estrella
	        pelicula_id : $(estrella).attr("id"),
	        usuario_id : $(estrella).attr("name") 
	    };

	    // Se envía el valor al archivo php
	    $.ajax({

	    	type: "POST", //método post
		  	url: "../model/valoracion.php", // archivo que va a recibir nuestro pedido
		  	dataType: "json", // indicamos que el formato utilizado es JSON
		  	data: datosClick, // el objeto JSON con los datos 

			// función que se ejecutará cuando obtengamos la respuesta
 		  	success:function(data){

		  		if (data.exito != true){
		  			            	
		  			$("#limitar").css("background","url(../images/messages/help.png ) no-repeat 0px 50%");
	             	$("#limitar").css("background-color","#B0CEF5");
	             	$("#limitar").css("border","1px solid #82AEE7");
	             	$("#limitar").html("<p style='margin-left:20px;'>Ya has valorado la película</p>");

	            }else{
	                var id = $(estrella).attr("id");
		  			$('#estrella').load('../includes/valoracion.php?id_pelicula='+id);
	            }
          	}

        });


	});

	$("#enviarCritica").click(function(event) {
		event.preventDefault();//Cancela el evento si este es cancelable, sin detener el resto del funcionamiento del evento
		// Se obtienen los atributos de la estrella que hizo clic
		var comenta=document.getElementById("critica").value;
		var coment=comenta.trim();
	    var comentario=this;
	    var usu=document.getElementById("critica").name;
	    if(coment==""){

			$("#noVacia").css("background","url(../images/messages/cross.png ) no-repeat 0px 50%");
			$("#noVacia").css("background-color","#FFF0EF");
			$("#noVacia").css("border","1px solid #C42608");
			$("#noVacia").html("<p style='margin-left:20px;'>La crítica no puede esta vacía</p>");
	    	return false;
	    }

		// creamos el objeto JSON para enviar a la página PHP
	   	var datosClick = {

	        id_pelicula : $(comentario).attr("name"), // le pasamos la id de la pelicula
	        id_usuario : usu, // le pasamos la id de usuario
	        contenido : coment // le pasamos la critica realizada por el usuario

	    };    

	    // Se envía el valor al archivo php
	    $.ajax({

	    	type: "POST", //método post
		  	url: "../model/criticas.php", // archivo que va a recibir nuestro pedido
		  	dataType: "json", // indicamos que el formato utilizado es JSON
		  	data: datosClick, // el objeto JSON con los datos 

		  	// función que se ejecutará cuando obtengamos la respuesta
		  	success:function(data){

		  		//textarea vacio despues de insert
		  		$('input[type=text], textarea').val('');

		  		var id = $("#enviarCritica").attr("name");

		  		$('#coment').load('../includes/criticas.php?id_pelicula='+id);

          	}

        });


	});


});
