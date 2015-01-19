$(document).ready(function() {

	$(".estrellasValoracion").click(function() {


		// Se obtienen los atributos de la estrella que hizo clic
	    var estrella=this;

		// creamos el objeto JSON para enviar a la página PHP
	   	var datosClick = {
	        clickEstrella : $(estrella).attr("value"), // le pasamos el valor de la estrella
	        pelicula_id : $(estrella).attr("id") 
	    };

	    // Se envía el valor al archivo php
	    $.ajax({

	    	type: "POST", //método post
		  	url: "../model/valoracion.php", // archivo que va a recibir nuestro pedido
		  	dataType: "json", // indicamos que el formato utilizado es JSON
		  	data: datosClick, // el objeto JSON con los datos 

		  	// función que se ejecutará cuando obtengamos la respuesta
		  	success:function(data){

		  		var id = $(estrella).attr("id");
		  		$('#estrella').load('../includes/valoracion.php?id_pelicula='+id);


          	}

        });


	});

});