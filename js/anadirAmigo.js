$(document).ready(function() {

$("#anadirAmigo").click(function(event) {

		event.preventDefault();//Cancela el evento si este es cancelable, sin detener el resto del funcionamiento del evento
		// Se obtienen los atributos del botón anadirAmigo
		var usu=document.getElementById("anadirAmigo").name;
	    var amigo=document.getElementById("anadirAmigo").value;

		// creamos el objeto JSON para enviar a la página PHP
	   	var datosClick = {

	        usuario : usu, // le pasamos la id de usuario
	        usu_amigo : amigo // le pasamos la critica realizada por el usuario

	    };    

	    // Se envía el valor al archivo php
	    $.ajax({

	    	type: "POST", //método post
		  	url: "../model/anadirAmigo.php", // archivo que va a recibir nuestro pedido
		  	dataType: "json", // indicamos que el formato utilizado es JSON
		  	data: datosClick, // el objeto JSON con los datos 

		  	// función que se ejecutará cuando obtengamos la respuesta
		  	success:function(data){

		  		if (data.exito != true){
		  			
		  			$("#limitar").css("background","url(../images/messages/help.png ) no-repeat 0px 30%");
	             	$("#limitar").css("background-color","#B0CEF5");
	             	$("#limitar").css("border","1px solid #82AEE7");
	             	$("#limitar").css("margin","0px 0px 10px 0px");
	             	$("#limitar").css("border-radius","4px");
	             	$("#limitar").css("padding","5px");
	             	$("#limitar").html("<p style='margin-left:20px;'>Para dejar de ser amigos, ve a tu perfil!</p>");

	            }else{
	            	$('#botonAmigo').load('../includes/amigos.php?usuario='+amigo+'&nUsuario='+usu);
	            }
          	}

        });

	});
});