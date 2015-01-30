function revisarEditarNombre(){
	// Se obtienen los valores del ormulario con el name editarNombre
	var nuevoNombre=document.forms["editarNombre"]["nombre"].value;
	nuevoNombre=nuevoNombre.trim();

	var password=document.forms["editarNombre"]["password"].value;
	password=password.trim();
	// Se compara si los datos son vacíos
	if(nuevoNombre==null || nuevoNombre==""){

		alert("Introduce el nombre de usuario");
		return false;
	}
	if(password == "" || password.length<8){ // Si la contraseña es menor de 8

		alert("La contraseña debe tener 8 caracteres.");
		return false;
	}

}

function revisarEditarEmail(){

	var password=document.forms["editarEmail"]["password"].value;
	password=password.trim();

	if(password == "" || password.length<8){

		alert("La contraseña debe tener 8 caracteres.");
	}

}