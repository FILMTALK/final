function revisarEditarNombre(){

	var password4=document.getElementById("exampleInputPassword4").value;
	password4=password4.trim();

	if(password4 == "" || password4.length<8){

		alert("La contraseña debe tener 8 carácteres.");
	}

}

function revisarEditarEmail(){

	var password5=document.getElementById("exampleInputPassword5").value;
	password5=password5.trim();

	if(password5 == "" || password5.length<8){

		alert("La contraseña debe tener 8 carácteres.");
	}

}