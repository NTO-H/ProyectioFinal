<?php

session_start();

include_once 'model/clsCliente.php';


// include_once 'model/clsLogin.php';

class controladorCliente
{
	private $vista;


	public function iniciaformulario()
	{
		$vista = "view/access/frmLogin.php";
		include_once("view/access/frmLogin.php");
	}
	public function AltaCliente()
	{
		$Cliente = new clsCliente();
		if (!empty($_POST)) {
		
			$nombre = $_POST['txtNombreP'];
			$AP = $_POST['txtAP'];
			$AM = $_POST['txtAM'];
			$Correo = $_POST['txtCorreo'];
			$NoTel = $_POST['txtNTel'];
			$Usuario = $_POST['txtUsuario'];
				$pass = $_POST['txtPassword'];
			$Cliente->AltaClientes($nombre, $AP, $AM,$Correo,$NoTel, $Usuario,$pass);
			$Consulta = $Cliente->ConsultaClientes();
			$vista = "view/access/frmRegistroUSR.php";
			include_once("view/access/frmRegistroUSR.php");
		} else {
			// $Consulta = $Cliente->ConsultaClientes();
			$vista = "vview/access/frmRegistroUSR.php";
			include_once("view/access/frmRegistroUSR.php");
		}
	}



	


	// public function ActualizarXEliminar()
	// {

	// 	$alumnos = new clsCliente();
	// 	if (!empty($_POST)) {
	// 		if (isset($_POST['btnActualizar'])) {

	// 			$matricula = $_POST['txtMatricula'];
	// 			$nombre = $_POST['txtNombre'];
	// 			$ap = $_POST['txtAP'];
	// 			$am = $_POST['txtAM'];
	// 			$p1 = $_POST['txtP1'];
	// 			$p2 = $_POST['txtP2'];
	// 			$p3 = $_POST['txtP3'];

	// 			$alumnos->Actualizar($matricula, $nombre, $ap, $am, $p1, $p2, $p3);
	// 			$Consulta = $alumnos->ConsultaAlumnos();
	// 			$vista = "Vistas/Alumnos/frmAlumnos.php";
	// 			include_once("Vistas/frmplantilla.php");
	// 		} else if (isset($_POST['btnEliminar'])) {

	// 			$matricula = $_POST['txtMatricula'];
	// 			$alumnos->Eliminar($matricula);
	// 			$Consulta = $alumnos->ConsultaAlumnos();
	// 			$vista = "Vistas/Alumnos/frmAlumnos.php";
	// 			include_once("Vistas/frmplantilla.php");
	// 		}
	// 	} else {
	// 		$Consulta = $alumnos->ConsultaAlumnos();
	// 		$vista = "Vistas/Alumnos/frmAlumnos.php";
	// 		include_once("Vistas/frmplantilla.php");
	// 	}
	// }
}
