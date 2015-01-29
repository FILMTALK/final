function revisarEditarNombre(){

	var password=document.forms["editarNombre"]["password"].value;
	password=password.trim();

	if(password == "" || password.length<8){

		alert("La contraseña debe tener 8 carácteres.");
		return false;
	}

}

function revisarEditarEmail(){

	var password=document.forms["editarEmail"]["password"].value;
	password=password.trim();

	if(password == "" || password.length<8){

		alert("La contraseña debe tener 8 carácteres.");
	}

}