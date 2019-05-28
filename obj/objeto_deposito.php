<?php
include_once("../clases/transaccion.php");
include_once('../json.php');

foreach($_POST as $nombre_campo => $valor)
{
   			$asignacion = "\$" . $nombre_campo . "='" . $valor . "';";
   			eval($asignacion);
}
switch($op)
{
 case'Guardar':
	$deposito=new Transaccion($corigen,$cdestino,$monto);
	$respuesta=$deposito->guardar_deposito();
	echo $respuesta;
	break;
}
?>