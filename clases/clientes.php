<?php
include_once("claseBD.php");
include("../Constantes.php"); 
class Usuario
{
	private $rut;
	private $nombre;
	private $numero_cuenta;
	private $saldo;
	private $clave;
	function __construct($rut,$nombre,$numero_cuenta,$saldo,$clave)
	{
		$this->rut=$rut;
		$this->nombre=$nombre;
		$this->numero_cuenta=$numero_cuenta;
		$this->saldo=$saldo;
		$this->clave=$clave;
	}
	function Buscar()
	{
		$BaseDato=new BaseDeDato(SERVIDOR,PUERTO,BD,USUARIO,CLAVE);//declarar el objeto de la clase base de dato
		$Consulta="SELECT * FROM cliente WHERE clave='$this->clave' and rut='$this->rut'";
		$Resultado=$BaseDato->Consultas($Consulta);//llamar a la funcion de la base de dato que realiza las consulta
		$Datos=@pg_fetch_all($Resultado);//Devuelve los datos en forma de arreglo
		if($Datos[0]['rut'])//verificar si arrojo algun resultado
			return $Datos;
		else
			return 0;		
	}
	function guardar_cliente()
	 {			
			$BaseDato=new BaseDeDato(SERVIDOR,PUERTO,BD,USUARIO,CLAVE);
			$Consulta="insert into cliente values ('$this->rut','$this->nombre','$this->numero_cuenta', '$this->saldo','$this->clave')";
			$Resultado=$BaseDato->Consultas($Consulta);
			if(pg_affected_rows($Resultado)>=0)
				return 1;
			else
				return 0;
	}
	function actualizar_cliente()
	 {			
			$BaseDato=new BaseDeDato(SERVIDOR,PUERTO,BD,USUARIO,CLAVE);
			$Consulta="update cliente set nombre='$this->nombre', numero_cuenta='$this->numero_cuenta', saldo='$this->saldo', clave='$this->clave' where rut='$this->rut'";
			$Resultado=$BaseDato->Consultas($Consulta);
			if(pg_affected_rows($Resultado)>=0)
				return 1;
			else
				return 0;
	}	
	function buscar_cliente()
	 {			
			$BaseDato=new BaseDeDato(SERVIDOR,PUERTO,BD,USUARIO,CLAVE);//declarar el objeto de la clase base de dato
			$Consulta="select * from cliente where rut='$this->rut'";
			$Resultado=$BaseDato->Consultas($Consulta);//llamar a la funcion de la base de dato que realiza las consulta
			$Datos=@pg_fetch_all($Resultado);//Devuelve los datos en forma de arreglo
			if($Datos[0]['rut'])//verificar si arrojo algun resultado
				return $Datos;
			else
				return 0;	
	}
}
?>