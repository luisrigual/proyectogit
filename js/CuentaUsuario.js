
function VerificarTecla(Evento) // Iniciar Sesion al presionar ENTER
{
	tecla = (document.all) ? Evento.keyCode : Evento.which;
	if (tecla==13) 
	IniciarSesion();
}
function LimpiarCampos()
{
	document.getElementById('rut').value="";
	document.getElementById('clave').value="";
}
function ValidacionInicioSesion()
{
	var campo=new Array("rut","clave");
	var resultado=new Array("RUT","Contrasena");
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
function IniciarSesion()
{
		var rut=document.getElementById('rut').value;
		var clave=document.getElementById('clave').value;
		//alert("usuario: "+usuario+" password: "+clave);
		if(ValidacionInicioSesion())		
		{AjaxRequest.post
		(
		 {'parameters':{'accion':"IniciandoSesion",'rut':rut,'clave':clave},
		'onSuccess':VerificarInicioSesion,//falta realizar esta funcion
		'url':"obj/CuentaUsuario.php",
		'onError':function(req){alert('ERROR!\nStatusText='+req.statusText+'\nContens='+req.responseText);}
		});
		}
}

function VerificarInicioSesion(req)
{
	var Resultado=eval("("+ req.responseText +")");
	if(Resultado.length>=1)
	{		
		AjaxRequest.post
		({'parameters':
		 {
			 'accion':"RegistrandoSesion",
			 'rut':Resultado[0]['rut'],
			 'nombre':Resultado[0]['nombre']
		},
		'onSuccess':VerificarRegistroSesion,
		'url':"obj/CuentaUsuario.php",
		'onError':function(req){alert('ERROR!\nStatusText='+req.statusText+'\nContens='+req.responseText);}
		});
	}
	else
	if(req.responseText==0)
	{
		alert("Usuario No Registrado o cuenta Desabilitada!\n");	
	}
}
function VerificarRegistroSesion(req)
{
	var Resultado=eval("("+ req.responseText +")");
	if(Resultado==1)
	{
		document.location="principal.php";
	}
}
function CerrarSesion()
{
	AjaxRequest.post
		(
		 {'parameters':{'accion':"CerrandoSesion"},
		'onSuccess':VerificarCerrarSesion,
		'url':"obj/CuentaUsuario.php",
		'onError':function(req){alert('ERROR!\nStatusText='+req.statusText+'\nContens='+req.responseText);}
		});
}
function VerificarCerrarSesion(req)
{
	var Resultado=eval("("+ req.responseText +")");
	if(Resultado==1)
	{
		document.location="index.html";
	}
}