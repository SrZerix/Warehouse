function cargarLejasLibres(str){
	var xmlhttp;
	if(str==""){
		document.getElementById("lejasDisponibles").innerHTML="";
		return;
	}

	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}else{
		xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange=function()  { 
 
  	if (xmlhttp.readyState==4 && xmlhttp.status==200) {  
   document.getElementById("lejasDisponibles").innerHTML=xmlhttp.responseText; 
	} 
  } 
 	xmlhttp.open("GET","AjaxLejasLibres.php?id="+str,true); 
   	xmlhttp.send(); 
}

function cargarHuecosLibres(str){	
        var xmlhttp;
	if(str==""){
		document.getElementById("posicion").innerHTML="";
		return;
	}

	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}else{
		xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange=function()  { 
 
  	if (xmlhttp.readyState==4 && xmlhttp.status==200) {  
   document.getElementById("posicion").innerHTML=xmlhttp.responseText; 
	} 
  } 
 	xmlhttp.open("GET","AjaxHuecosLibres.php?id="+str,true); 
   	xmlhttp.send(); 
}
