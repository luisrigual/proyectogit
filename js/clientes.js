function validar()
{
	var campo=new Array("rut","nombre","numeroc","saldo","clave");
	var resultado=new Array("RUT","Apellidos y Nombres","Numero de Cuenta","Saldo Inicial","Contrasena");
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
	document.getElementById('rut').value="";
	document.getElementById('nombre').value="";
	document.getElementById('numeroc').value="";
	document.getElementById('saldo').value="";
	document.getElementById('clave').value="";
	document.getElementById('guardarc').disabled=false;	
	document.getElementById('modificarc').disabled=true;	
	document.getElementById('rut').disabled=false;	
}
function guardar()
 {
    if(validar())
    {	
    var rut = document.getElementById('rut').value;
	var nombre=document.getElementById('nombre').value;
	var numeroc =document.getElementById('numeroc').value;
	var saldo = document.getElementById('saldo').value;
	var clave=document.getElementById('clave').value;
    AjaxRequest.post
	(	
		{
		  'parameters':
		  { 
			"rut":rut,
			"nombre":nombre,
			"numeroc":numeroc,
			"saldo":saldo,
			"clave":clave,
			"op":"Guardar"
		  }
		  ,'onSuccess':mostrar_resulGuardar
		  ,'url':'Obj/objeto_clientes.php'
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
	 alert("Datos guardados satisfactoriamente."); 
	 limpiar(); 
	}
}
function modificar()
 {
  if(validar())
  {
  var rut = document.getElementById('rut').value;
  var nombre=document.getElementById('nombre').value;
  var numeroc =document.getElementById('numeroc').value;
  var saldo = document.getElementById('saldo').value;
  var clave=document.getElementById('clave').value;
  AjaxRequest.post
  (	
	  {
		  'parameters':
		  { 
			"rut":rut,
			"nombre":nombre,
			"numeroc":numeroc,
			"saldo":saldo,
			"clave":clave,
			"op":"Modificar"
		  }
		  ,'onSuccess':mostrar_resulModificarCliente
		  ,'url':'Obj/objeto_clientes.php'
		  ,'onError':function(req)
		  { 
			  alert('Error!\nStatusText='+req.statusText+'\nContents='+req.responseText);
		  }
	  }
 );
} 
}
function mostrar_resulModificarCliente(req)
 {
    if(req.responseText==1)
    {
	 alert("Datos Modificados satisfactoriamente."); 
	 limpiar(); 
	}
}
function buscar()
{
  var rut=document.getElementById('rut').value;
  if(rut!="")
  {	
   AjaxRequest.post
			  (	
				  {
					  'parameters':
					  { 
					    "rut":rut,
						"op":"Buscar"
					  }
					  ,'onSuccess':mostrar_resulBusqueda
					  ,'url':'Obj/objeto_clientes.php'
					  ,'onError':function(req)
					  { 
						  alert('Error!\nStatusText='+req.statusText+'\nContents='+req.responseText);
					  }
				  }
			 );
  }
 }
function mostrar_resulBusqueda(req)
 {
   var resultado=req.responseText;
   var dato=eval("("+resultado+")");	
	if(resultado!=0)
	{
	 document.getElementById('rut').value=dato[0]['rut'];	
	 document.getElementById('nombre').value=dato[0]['nombre'];
	 document.getElementById('numeroc').value=dato[0]['numero_cuenta'];	
	 document.getElementById('saldo').value=dato[0]['saldo'];
	 document.getElementById('clave').value=dato[0]['clave'];	
	 document.getElementById('rut').disabled=true;	
	 document.getElementById('guardarc').disabled=true;	
	 document.getElementById('modificarc').disabled=false;	
	}
}