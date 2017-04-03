function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
 
	try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
		xmlhttp = false;
	}
}
 
if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	  xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function Registrar(idC,accion){
  nombre=document.Contactos.nombre.value;
  telefono1=document.Contactos.telefono1.value;
  telefono2=document.Contactos.telefono2.value;
  email=document.Contactos.email.value;
  direccion=document.Contactos.direccion.value;

  ajax=objetoAjax();

  if(accion=='N'){
      ajax.open("POST","Contacto/agregar/",true);
  }else if (accion=='E'){
      ajax.open("POST","Contacto/editar/",true);
  }

  //alert(data['nombre']);
  ajax.onreadystatechange=function(){
    
    if(ajax.readyState==4){
     swal("Guardando","El Contacto ha sido Guardado", "success");
     window.location.reload(true); 
    }
  }

  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send("nombre="+nombre+"&telefono1="+telefono1+"&telefono2="+telefono2+"&email="+email+"&direccion="+direccion+"&idC="+idC);
}

function Eliminar(idC){
  if(confirm("Desea eliminar el contacto?")){
    ajax=objetoAjax();
    ajax.open("POST","Contacto/eliminar/",true);
    ajax.onreadystatechange=function(){
      if(ajax.readyState==4){
        swal("Eliminando","El Contacto ha sido Eliminado", "success");
        window.location.reload(true);
      }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("idC="+idC);
  }else{

  }
}



