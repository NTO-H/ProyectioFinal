<?php
include_once 'model/clsconexion.php';

class clsSabor extends clsConexion
{

	public function consultaSabor()
	{
		$sql = "SELECT idSabor,vchSabor FROM tblsabor;";
		$resultado = $this->conectar->query($sql);
		return $resultado;
	}
}
