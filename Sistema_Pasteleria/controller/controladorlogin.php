<?php
session_start(); //Con esto indicamos que se estarán manejando sesiones guardadas para utilizarlas en todo el sitio
include_once 'model/clsLogin.php';
include_once 'model/clsProducto.php';

class controladorlogin
{
    private $vista;


    public function inicio()
    {
        $vista = "view/access/frmLoginUsr.php";
        include_once("view/access/frmPlantillaAccess.php");
    }

    public function Acceder()
    {
        //ver si hay post
        $Producto = new clsProducto();
        $Consulta = $Producto->ConsultaProducto();

        $login = new clsLogin();


        if (!empty($usuario)  or !empty($password)) {
        }


        if (!empty($_POST)) {
            $usuario = $_POST['txtusuario'];
            $password = $_POST['txtpassword'];
            $datos = $login->buscausuario($usuario, $password);
            $usuario = $datos->fetch_object(); //Extraemos lo que se obtiene de la consulta
            if ($datos->num_rows > 0) //si es mayor a cero significa que encontró el usuario.
            {
                $_SESSION['TipoUsuario'] = $usuario->vchTipo;
                //verifica en la base de datos cuando le estamos pasando los datos si es adiministrador  y si lo es que lo de deje acceder al contenido de admimistradores 
                if ($_SESSION['TipoUsuario'] === "A") {
                    $vista = "view/admin/defaultinf.php";
                    include_once("view/admin/frmAdmin.php");
                    //si es usuario que lo redireccione al contenido para clientes 
                    
                } else if ($_SESSION['TipoUsuario'] === "cliente") {
                    $vista = "view/client/frmProductos.php";


                    // echo '<label> <input type="text" name="txtusuario" value="' . $fila->usuario . '" ></label>';



                    include_once("view/client/frmContenidoCliente.php");
                }
                // //Aquí vamos a guardar el tipo de usuario que viene de la BD

            } else {
                //   <a href=""> alert('tiene que iniciar sesión como cliente');
                //   </a> 
                echo ('<center >Los datos son incorrectos</center>');
                $vista = "view/access/frmLogin.php";
                include_once("view/access/frmLogin.php");

            }
        }
    }
    public function cerrarsesion()
    {
        $Producto = new clsProducto();
        $Consulta = $Producto->ConsultaProducto();
        $vista = "view/public/frmContenidoComercial.php";
        include_once("view/frmPublic.php");
        session_destroy();
    }
}
