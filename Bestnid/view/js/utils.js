function validarNuevoUsuario() {
	var nombre=document.getElementById('nombre').value;
	var apellido=document.getElementById('apellido').value;
	var email=document.getElementById('email').value;	
	var usuario=document.getElementById('usuario').value;
	var pasw=document.getElementById('pass').value;
	var cPasw=document.getElementById('confirmPass').value;
	var nTarjeta=document.getElementById('nroTarjeta').value;
  if (!(/^[a-zA-Z\s]*$/.test(nombre))) {
  	  nombre
  	return false;
  }
  else if (!(/^[a-zA-Z\s]*$/.test(apellido))) {
  	  alert("error en el apellido");
   return false;
  }
  else if (!(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email))) {
  	  alert("formato de email incorrecto");
   return false;
  }
  /*else if (/^[a-zA-Z\s]*$/.test(usuario)) {
  	  	alert("fallo 4");
	return false;  
  }*/
  else if ((/^\s+$/.test(pasw))) {
  	  alert("no se admite espacio en blanco	");
  	return false;
  }
  else if ((/^\s+$/.test(cPasw))) {
  	return false;
  }
  /*else if(cPasw != pasw){
  	alert("desigual");
  	return false;
  }*/
  else if (!(/^\d{4}-\d{4}-\d{4}-\d{4}$/.test(nTarjeta))) {
  	alert("formato de tarjeta invalido")
	return false;	  
  }
  // Si el script ha llegado a este punto, todas las condiciones
  // se han cumplido, por lo que se devuelve el valor true
  alert("TODO OK");
  return true;
}

  

