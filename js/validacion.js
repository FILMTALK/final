function validarRegistro(){
	// Obtiene el valor del input username del formulario con el nombre registro
	var username=document.forms["registro"]["username"].value;
	// Se eliminan los espacios del principio y final
	username=username.trim();

	var password1=document.forms["registro"]["password"].value;
	password1=password1.trim();

	var password2=document.forms["registro"]["password2"].value;
	password2=password2.trim();

	// Si el valor de la variable username es vacío
	if(username==null || username==""){
		// Aparece el mensaje
		alert("Introduce el nombre de usuario");
		return false;
	}
	// Si la contraseña es vacía o contiene menos de 8 caracteres
	if(password1==null || password1.length<8){
		// Sale un aviso por pantalla
		alert("Revisa la contraseña.");
		return false;
	}
	if(password2==null || password2.length<8){

		alert("Revisa la contraseña que se repite.");
		return false;
	}

}

function validarLogin(){
	// Obtiene el valor del input password del formulario mediante el name login
	var password=document.forms["login"]["password"].value;
	// Se eliminan los espacios del principio y final
	password=password.trim();
	// Si la contraseña es vacía o contiene menos de 8 caracteres
	if(password==null || password.length<8){
		// Sale un aviso por pantalla
		alert("La contraseña debe tener 8 caracteres.");
		return false;
	}

}