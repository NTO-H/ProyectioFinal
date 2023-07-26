<?php

// session_start();

include_once 'model/clsEmpleado.php';


class controladorEmpleado
{
    private $vista;


    public function iniciaformulario()
    {
        $vista = "view/admin/frmRegistroEmpleado.php";

        include_once("view/admin/frmAdmin.php");
    }

    public function insertarEmpleado()
    {
        
        $Empleado = new clsEmpleado();

        if (!empty($_POST)) {
            // $tipo=$_POST['txtTip'];
            $nombre = $_POST['txtNombreP'];
            $AP = $_POST['txtAP'];
            $AM = $_POST['txtAM'];
            $Correo = $_POST['txtCorreo'];
            $NoTel = $_POST['txtNTel'];

            $Usuario = $_POST['txtUsuario'];
            $pass = $_POST['txtPassword'];

            $Empleado->AltaEmpleado($nombre, $AP, $AM, $Correo, $NoTel, $Usuario, $pass);

            // $Consulta = $Empleado->ConsultaEmpleado($tipo);
            $vista = "view/admin/frmRegistroEmpleado.php";
            include_once("view/admin/frmAdmin.php");
        } else {
            // $Consulta = $Empleado->ConsultaEmpleado();
            $vista = "view/admin/frmRegistroEmpleado.php";
            include_once("view/admin/frmAdmin.php");
        }
    }



    public function ActualizarXEliminar()
    {
        $Empleado = new clsEmpleado();
        if (!empty($_POST)) {
            if (isset($_POST['btnActualizar'])) {
                $IdUser=$_POST['txtcodigo_E'];
                $Nombre = $_POST['txtNombreP'];
                $AP = $_POST['txtAP'];
                $AM = $_POST['txtAM'];
                $Correo = $_POST['txtCorreo'];
                $NoTel = $_POST['txtNTel'];
                $Usuario = $_POST['txtUsuario'];
                $pass = $_POST['txtPassword'];
                // $IdEm = $_POST['txtcodigo_Empleado'];
                // $Consulta = $Empleado->
                $Empleado->Actualizar($IdUser,$Nombre, $AP, $AM, $Correo, $NoTel, $Usuario, $pass);
                $vista = "view/admin/verEmpleados.php";
                
                $Consulta = $Empleado->ConsultaEmpleado();
                include_once("view/admin/frmAdmin.php");
            } else if (isset($_POST['btnEliminar'])) {

                $IdEm = $_POST['txtcodigo_E'];
                $Empleado->Eliminar($IdEm);
                $Consulta = $Empleado->ConsultaEmpleado();
                $vista = "view/admin/frmRegistroEmpleado.php";
                include_once("view/admin/frmAdmin.php");
            }
        } else {
            $Consulta = $Empleado->ConsultaEmpleado();
            $vista = "view/admin/frmRegistroEmpleado.php";
            include_once("view/admin/frmAdmin.php");
        }
    }

    public function VerEmpleados()
    {
        $Empleado = new clsEmpleado();
        // $tipo=$_POST['txtcodigo_Empleado'];
        $Consulta = $Empleado->ConsultaEmpleado();
        $vista = "view/admin/verEmpleados.php";
        include_once("view/admin/frmAdmin.php");
    }
}
