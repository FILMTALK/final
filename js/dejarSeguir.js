$(document).ready(function() {

	$(".borrarPeli").click(function(event) {
		event.preventDefault();//Cancela el evento si este es cancelable, sin detener el resto del funcionamiento del evento

		var sigue=this;
		// creamos el objeto JSON para enviar a la página PHP
	   	var datosClick = {

	        titulo: $(sigue).attr("name"),
	        id_usuario : $(sigue).attr("value")
	    };

	    // Se envía el valor al archivo php
	    $.ajax({
	    	
	    	type: "POST", //método post
		  	url: "../model/dejarSeguir.php", // archivo que va a recibir nuestro pedido
		  	dataType: "json", // indicamos que el formato utilizado es JSON
		  	data: datosClick, // el objeto JSON con los datos 

			// función que se ejecutará cuando obtengamos la respuesta
 		  	success:function(data){

 		  		if (data.exito != true){
		  			            	
		  			alert("FALLOOOO");

	            }else{
	 		  		var id = $(sigue).attr("value");
	 		  		alert("SIIIIII");
	 		  		$('#pelisigue').load('../includes/peliSigues.php?id_usuario='+id);
	            }
          	}

        });


	});
});
