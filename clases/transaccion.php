<?php
include_once("claseBD.php");
include("../Constantes.php"); 
class Usuario
{
	private $corigen;
	private $cdestino;
	private $monto;
	function __construct($corigen,$cdestino,$monto)
	{
		$this->corigen=$corigen;
		$this->cdestino=$cdestino;
		$this->monto=$monto;
	}
	function guardar_deposito()
	 {			
			$fecha=date("Y")."-".date("m")."-".date("d");
			$hora=date("H");
			$BaseDato=new BaseDeDato(SERVIDOR,PUERTO,BD,USUARIO,CLAVE);
			$Consulta="insert into transaccion values ('$this->monto','$this->cdestino','$this->corigen, '$this->fecha','$this->hora')";
			$Resultado=$BaseDato->Consultas($Consulta);
			if(pg_affected_rows($Resultado)>=0)
				return 1;
			else
				return 0;
	}
}
?>