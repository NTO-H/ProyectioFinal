<?php

session_start();
include_once 'model/clsProducto.php';
include_once 'model/clsCompra.php';
include_once 'model/clsLogin.php';
include_once 'model/clsCliente.php';

class controladorCarrito
{
    public function elimina_de_list()
    {
        $carritoJson = $_POST['carrito'];
        $indiceEliminar = $_POST['indiceProducto'];
        if (isset($_POST['btnEliminar'])) {
            $carrito = json_decode($carritoJson, true);
            if (is_array($carrito) && isset($carrito[$indiceEliminar])) {
                unset($carrito[$indiceEliminar]);
            }
            $carritoJsonActualizado = json_encode($carrito);
            $_SESSION['carrito'] = $carritoJsonActualizado;
            $this->procesa_lista();
        }
    }
    public function volver_Catalogo()
    {
        $carrito = $_SESSION['carrito'];
        $Producto = new clsProducto();
        $Consulta = $Producto->ConsultaProducto();
        $vista = "view/public/frmContenidoComercial.php";
        include_once("view/frmPublic.php");
        exit();
    }
    public function procesa_lista()
    {
        $producto_ = new clsProducto();
        $producto_1 = new clsProducto();
        if (isset($_POST['carrito'])) {
            $productosSeleccionados = json_decode($_POST['carrito'], true);
            $_SESSION['carrito'] = $productosSeleccionados;
            if (!empty($productosSeleccionados)) {
                if (isset($_POST['btnEliminar']) && isset($_POST['indiceProducto'])) {
                    $indiceEliminar = $_POST['indiceProducto'];
                    if (isset($productosSeleccionados[$indiceEliminar])) {
                        unset($productosSeleccionados[$indiceEliminar]);
                        $productosSeleccionados = array_values($productosSeleccionados);
                        $_SESSION['carrito'] = $productosSeleccionados;
                    }
                }
                $productos = array();
                foreach ($productosSeleccionados as $idProducto) {
                    $producto = $producto_->traeProducto_By_id($idProducto);
                    if ($producto) {
                        $productos[] = $producto;
                    }
                }
                $data = array(
                    'productos' => $productos,
                    'productosSeleccionados' => $productosSeleccionados
                );
                $localidades = $producto_1->TraeLocalidad_Costo();
                include_once("view/public/frmCarrito.php");
            } else {
                echo "<script> alert('No hay productos seleccionados'); window.location= 'index.php'; </script>";
            }
        } else {
            echo "<script> alert('No se ha enviado el carrito'); window.location= 'index.php'; </script>";
        }
    }

    public function procesa_compra()
    {
        if (empty($_SESSION['usuario'])) {
            // Obtener el id del costo de envío seleccionado
            $costoEnvioId = $_POST['txtSabor'];
            // Obtener el carrito de compras en formato JSON
            $carritoJson = $_POST['carrito'];
            $productosSeleccionados = json_decode($carritoJson, true);
            // Obtener las cantidades de cada producto seleccionado
            $cantidades = $_POST['cantidadProducto'];
            $vista = "view/access/frmLoginCompra.php";
            include_once("view/access/frmLoginCompra.php");
        }
    }
    public function continuarCompra()
    {
        $login = new clsLogin();
        $data = new clsLogin();
        $producto_ = new clsProducto();
        $producto_1 = new clsProducto();
        $mi_Compra = new clsCompra();

        // Datos de usuario enviados por POST
        $usuario = $_POST['txtusuario'];
        $password = $_POST['txtpassword'];
        $idenv = $_POST['costoEnvioId'];
        // Buscar el usuario en la base de datos
        $datos = $login->buscausuario($usuario, $password);
        $datos_loca = $producto_1->TraeCosto_ID_localidad($idenv);
        $localidad = $datos_loca->fetch_object(); // Extraemos el resultado de la consulta
        if ($datos->num_rows > 0) // Si encontró el usuario
        {
            // Traer los datos de cliente
            $datos2 = $data->traeusuario($usuario, $password);
            $usuario2 = $datos2->fetch_object(); // Extraemos el resultado de la consulta
            $lista_IDS = $_POST['productosSeleccionados'];
            $productosSeleccionados = json_decode($lista_IDS, true);
            // Obtener la cantidad de cada producto seleccionado
            $cantidades = json_decode($_POST['cantidad'], true);
            $datosCompra = array();
            $totalVenta_producto = 0;
            foreach ($productosSeleccionados as $index => $idProducto) {
                $producto = $producto_->traeProducto_By_id($idProducto);
                if ($producto) {
                    $precio = floatval($producto['Precio']);
                    $cantidad = floatval($cantidades[$index]);
                    $precioTotalProducto = $precio * $cantidad;
                    $datosProducto = array(
                        'idP' => $idProducto,
                        'Cant' => $cantidad,
                        'Precio' => $precio,
                        'Subtotal' => $precioTotalProducto
                    );
                    $datosCompra[] = $datosProducto;
                    $totalVenta_producto += $precioTotalProducto;
                }
            }
            
            //en esta parte debo de hacer la insercion 
            $CostoEnv = $localidad->fltCosto;
            $TotalVenta = floatval($totalVenta_producto) + floatval($CostoEnv);
            $idCliente = $usuario2->idUser;
            $jsonDatosCompra = $datosCompra;
            $reporte_compra = $mi_Compra->Ventas($idCliente, $totalVenta_producto, $idenv, $CostoEnv, $TotalVenta, $jsonDatosCompra);
            // echo json_encode($reporte_compra);
            /////////////nuevo

            // Procesar los datos de la respuesta
            $idVenta = $reporte_compra['idVenta'];
            $idCliente = $reporte_compra['idCliente'];
            $totalVenta = $reporte_compra['TotalVenta'];
            $carro = $reporte_compra['carro'];

            // Realizar consultas adicionales con los datos del reporte
// Por ejemplo, obtener los datos del cliente
            $cliente_ = new clsCliente();
            $datosCliente = $cliente_->traeCliente_By_id($idCliente);
            $cliente = $datosCliente->fetch_object(); // Extraemos el resultado de la consulta
            // Mostrar los datos en un formulario o reporte
            echo "<script> alert('La transacción se realizó correctamente'); </script>";
            $vista = "view/public/frmCompraFinalizada.php";
            include_once("view/public/frmCompraFinalizada.php");


        }
    }




}