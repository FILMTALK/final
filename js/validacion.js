function validarRegistro(){

	var username=document.forms["registro"]["username"].value;
	username=username.trim();

	var password1=document.forms["registro"]["password"].value;
	password1=password1.trim();

	var password2=document.forms["registro"]["password2"].value;
	password2=password2.trim();

	if(username==null || username==""){

		alert("Introduce el nombre de usuario");
		return false;
	}
	if(password1==null || password1.length<8){

		alert("Revisa la contraseña.");
		return false;
	}
	if(password2==null || password2.length<8){

		alert("Revisa la contraseña para verificar.");
		return false;
	}

}

function validarLogin(){

	var password=document.forms["login"]["password"].value;
	password=password.trim();

	if(password==null || password.length<8){

		alert("La contraseña debe tener 8 carácteres.");
		return false;
	}

}