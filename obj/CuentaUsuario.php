<?php
include_once("../clases/clientes.php");
include_once("../json.php");
foreach($_POST as $NombreCampo => $Valor)
{
	$Asignacion = "\$".$NombreCampo."='".$Valor."';";
	eval($Asignacion);
}
switch($accion)
{		
		case 'IniciandoSesion':
		$Usuario=new Usuario($rut,"","","",$clave);
		$Salida=$Usuario->Buscar();		
		if(!is_array($Salida))
		{
			$Json=new Services_JSON();
			$Respuesta=$Json->encode(0);
		}
		else
		{
			$Json=new Services_JSON();
			$Respuesta=$Json->encode($Salida);
		}
		echo $Respuesta;		
		break;
		case 'RegistrandoSesion':
		session_start();
		$Salida=session_register('rut','nombre');
		$_SESSION['rut']=$rut;	
		$_SESSION['nombre']=$nombre;
		echo $Salida;
		break;
		case 'CerrandoSesion':
			session_start(); 
			$Salida=session_destroy();
			echo $Salida;
		break;
}
?>