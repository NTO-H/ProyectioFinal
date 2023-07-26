<?php
include_once 'model/clsconexion.php';

class clsCliente extends clsconexion
{
	public function AltaClientes( $nombre, $AP, $AM, $Correo,$NoTel, $Usuario,$pass) ////function for admin and user
	{

		$sql = "call Sp_InsertClient('$nombre','$AP','$AM','$Correo','$NoTel','$Usuario','$pass');";
		$resultado = $this->conectar->query($sql);
		return $resultado;
	}
	public function Actualizar( $nombre, $AP, $AM,$Correo, $NoTel, $Usuario,$pass,$id) ////function for admin
	{
		$sql = "CALL Sp_UpdateClient(' $nombre','$AP','$AM','$Correo','$NoTel','$Usuario','$pass','$id');";
		$resultado = $this->conectar->query($sql);
		return $resultado;
	}
	
	public function Eliminar($id) //function for admin
	{
		$sql = "call Sp_DeleteClient('$id');";
		$resultado = $this->conectar->query($sql);
		return $resultado;
	}
	public function ConsultaClientes() //function for admin
	{
		$sql = "CALL Sp_QueryClient;";
		$resultado = $this->conectar->query($sql);
		return $resultado;
	}	
	public function traeCliente_By_id($id) 
	{
		$sql = "CALL traeUsuarioCXEBy_ID($id);";
		$resultado = $this->conectar->query($sql);
		return $resultado;
	}	
}
