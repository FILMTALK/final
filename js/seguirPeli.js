$(document).ready(function() {

	$("#seguir").click(function() {

		event.preventDefault();//Cancela el evento si este es cancelable, sin detener el resto del funcionamiento del evento

	    var seguir=this;

		// creamos el objeto JSON para enviar a la página PHP
	   	var datosClick = {
	        titulo : $(seguir).attr("name"),
	        usuario_id : $(seguir).attr("value") 
	    };

	    // Se envía el valor al archivo php
	    $.ajax({

	    	type: "POST", //método post
		  	url: "../model/seguirPeli.php", // archivo que va a recibir nuestro pedido
		  	dataType: "json", // indicamos que el formato utilizado es JSON
		  	data: datosClick, // el objeto JSON con los datos 

			// función que se ejecutará cuando obtengamos la respuesta
 		  	success:function(data){

		  		if (data.exito != true){
		  			alert("NO");

	            }else{
	            	$("#seguir").html('Siguiendo');
	            }
          	}

        });
    });
});