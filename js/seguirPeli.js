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
		  			$("#limitar").css("background","url(../images/messages/help.png ) no-repeat 0px 50%");
	             	$("#limitar").css("background-color","#B0CEF5");
	             	$("#limitar").css("border","1px solid #82AEE7");
	             	$("#limitar").html("<p style='margin-left:20px;'>Para dejar de seguir, ve a tu perfil!</p>");

	            }else{
	            	$("#seguir").html('Siguiendo');
	            }
          	}

        });
    });

	$("#siguiendo").click(function() {
		
		$("#limitar").css("background","url(../images/messages/help.png ) no-repeat 0px 50%");
     	$("#limitar").css("background-color","#B0CEF5");
     	$("#limitar").css("border","1px solid #82AEE7");
     	$("#limitar").html("<p style='margin-left:20px;'>Para dejar de seguir, ve a tu perfil!</p>");
    });
});