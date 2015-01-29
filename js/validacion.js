function revisarUsername(){

	var username=document.getElementById("exampleInputUsername").value;
	username=username.trim();

	if(username == "" || username.length<0){

		alert("Revisa el nombre de usuario.");

	}


}

function revisarPassword1(){

	var password1=document.getElementById("exampleInputPassword1").value;
	password1=password1.trim();

	if(password1 == "" || password1.length<8){ 

		alert("Revisa la contraseña.");

	}

}

function revisarPassword2(){

	var password2=document.getElementById("exampleInputPassword2").value;
	password2=password2.trim();

	if(password2 == "" || password2.length<8){ 

		alert("Revisa la contraseña para verificar.");

	}
	
}

function revisarCampoLogin(){

	var password3=document.getElementById("exampleInputPassword3").value;
	password3=password3.trim();

	if(password3 == "" || password3.length<8){

		alert("La contraseña debe tener 8 carácteres.");

	}

}