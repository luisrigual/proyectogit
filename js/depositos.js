function validar()
{
	var campo=new Array("corigen","cdestino","monto");
	var resultado=new Array("Numero de cuenta origen","Numero de cuenta destino","Monto");
	var error="";
	for(var i=0;i<campo.length;i++)
	{
		if(document.getElementById(campo[i]).value=="")
		{
			error=error+"-"+resultado[i]+"\n";
		}
	}
	if (error!="")
	{
		alert("Error de validacion, complete los siguentes campos: \n"+error);
		return false;
	}
	return true;
}

function limpiar()
{
	document.getElementById('corigen').value="";
	document.getElementById('cdestino').value="";
	document.getElementById('monto').value="";	
}
function guardar()
 {
    if(validar())
    {	
    var corigen = document.getElementById('corigen').value;
	var cdestino=document.getElementById('cdestino').value;
	var monto =document.getElementById('monto').value;
    AjaxRequest.post
	(	
		{
		  'parameters':
		  { 
			"corigen":corigen,
			"cdestino":cdestino,
			"monto":monto,
			"op":"Guardar"
		  }
		  ,'onSuccess':mostrar_resulGuardar
		  ,'url':'Obj/objeto_depositos.php'
		  ,'onError':function(req)
		  { 
			  alert('Error!\nStatusText='+req.statusText+'\nContents='+req.responseText);
		  }
		}
	);
  }
  
 }
function mostrar_resulGuardar(req)
 {
    if(req.responseText==1)
    {
	 alert("Deposito realizado satisfactoriamente."); 
	 limpiar(); 
	}
}