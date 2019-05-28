<?php
include_once("../clases/clientes.php");
include_once('../json.php');

foreach($_POST as $nombre_campo => $valor)
{
   			$asignacion = "\$" . $nombre_campo . "='" . $valor . "';";
   			eval($asignacion);
}
switch($op)
{
 case'Guardar':
	$cliente=new Usuario($rut,$nombre,$numeroc,$saldo,$clave);
	$respuesta=$cliente->guardar_cliente();
	echo $respuesta;
	break;
case'Modificar':
    $cliente=new Usuario($rut,$nombre,$numeroc,$saldo,$clave);
    $respuesta=$cliente->actualizar_cliente();
    echo $respuesta;
    break;
case'Buscar':
	$cliente=new Usuario($rut,"","","","");
	$respuesta=$cliente->buscar_cliente();
	if(!is_array($respuesta))
	{
		$json=new Services_JSON(); 
    	$resp=$json->encode(0);
	}
	else
	{
			$json=new Services_JSON();
			$resp=$json->encode($respuesta);
	}
	echo $resp;
	break;
}
?>