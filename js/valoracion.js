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
	              alert('Ya has valorado la película');
	            }else{
	                var id = $(estrella).attr("id");
		  			$('#estrella').load('../includes/valoracion.php?id_pelicula='+id);
	            }
          	}

        });


	});

	$("#enviarCritica").click(function() {
		event.preventDefault();//Cancela el evento si este es cancelable, sin detener el resto del funcionamiento del evento
		// Se obtienen los atributos de la estrella que hizo clic
		var comenta=document.getElementById("critica").value;
		var coment=comenta.trim();
	    var comentario=this;
	    var usu=document.getElementById("critica").name;
	    if(coment==""){
	    	
	    	alert("La crítica no puede esta vacía");
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

		  		var id = $("#enviarCritica").attr("name");

		  		$('#coment').load('../includes/criticas.php?id_pelicula='+id);


          	}

        });


	});


});