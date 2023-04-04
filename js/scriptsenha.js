function mostrarOcultarSenha(){
	var senha= document.getElementById("txtsenha");
	if(senha.type=="password"){
		senha.type = "text";
	}else{
		senha.type="password";
	}
}


function mostrarOcultarSenhaeditar(){
	var senha= document.getElementById("txtsenhaeditar");
	if(senha.type=="password"){
		senha.type = "text";
	}else{
		senha.type="password";
	}
}