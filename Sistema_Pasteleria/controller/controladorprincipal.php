<?php
include_once  'model/clsProducto.php';


class controladorprincipal

{
	private $vista;
	public function inicio()
	{
		$Producto = new clsProducto();
		$Consulta = $Producto->ConsultaProducto();
		$vista = "view/public/frmContenidoComercial.php";
		include_once("view/frmPublic.php");
	}

	public function interfazUsuario()
	{
		$Producto = new clsProducto();
		$Consulta = $Producto->ConsultaProducto();
		$vista = "view/public/frmContenidoComercial.php";
		include_once("view/frmPublic.php");
	}
	public function interfazAdministrador()
	{

		$vista = "view/admin/defaultinf.php";
		include_once("view/admin/frmAdmin.php");
	}
	public function ModalActua()
	{

		$vista = "view/admin/ActualizaPro.php";
		include_once("view/admin/frmAdmin.php");
	}
	public function iniciar()
	{

		$vista = "view/access/frmLogin.php";
        include_once("view/access/frmLogin.php");
	}
}

