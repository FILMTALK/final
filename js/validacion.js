function revisarLongitud(elemento,minimo){
		
	//Se obtienen el valor de cada elemento
	var password=document.getElementById("exampleInputPassword1").value;
	
	//Si la longitud es menor que el mínimo
	if(password.length<minimo){
		
		alert("La contraseña debe contener mínimo 8 caracteres.");
		
	}

} //Cierre de la función

function validar(){

	var correcto=true;

	//Si el valor del password es menor que 8 caracteres
	if(document.getElementById("exampleInputPassword1").value.length<8){
		
		correcto=false;
	}

	if(!correcto){
		
		alert("Algunos de los datos tienen errores, por favor corrige antes de enviar");
	}
	
	return correcto;

} //Cierre de la función