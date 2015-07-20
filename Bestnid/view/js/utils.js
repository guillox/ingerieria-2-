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

  function MostrarOcultar(texto)  
{  
      
        document.getElementById('necesidad-Completo').innerHTML='<h4 class="modal-title tituloNecesidad" id="myModalLabel">Necesidad</h4><p class="textoNecesidad">'+texto+'</p>';
    
} 
function MostrarOcultar2(texto)  
{  
			      
        document.getElementById('necesidad-Completo').innerHTML='<h4 class="modal-title tituloNecesidad" id="myModalLabel">Datos</h4><p class="textoNecesidad">Email: '+texto+'</p><p class="textoNecesidad">Usuario: '+document.getElementById('nombre').value+'</p>';
    
}  
function MostrarOcultar3(texto)  
{  
			      
        document.getElementById('necesidad-Completo').innerHTML='<h4 class="modal-title tituloNecesidad" id="myModalLabel">Datos</h4><p class="textoNecesidad">Email: '+texto+'</p><p class="textoNecesidad">Nombre: '+document.getElementById('nombre').value+'</p>';
    
} 

  function MostrarDatos(email,nombre)  
{  
   		console.log(email) ;  
        document.getElementById('datosContacto').innerHTML='<h4 class="modal-title tituloNecesidad" id="myModalLabel">DATOS</h4><p class="textoNecesidad">Nombre: </p><p class="textoNecesidad">Em@il: '+email+'</p>';
    
}  

function showUser() {
	str1=document.getElementById("inicioAdmin").value;
	str2=document.getElementById("finAdmin").value;	
		    
    if (str1 == "") {
        document.getElementById("divPrueba").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("divPrueba").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("POST","view/reporteUsuarios.php?c=usuario&inicio="+str1+"&fin="+str2+"&control=1",true);
        xmlhttp.send();
    }
}

