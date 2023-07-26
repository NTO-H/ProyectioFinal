<?php
include_once 'model/clsConexion.php';

class clsCompra extends clsConexion
{

	

    public function Ventas($idCliente, $Total, $idCosto, $CostoEnv, $TotalVenta, $carro)
    {
        // Activar las excepciones de MySQLi
        mysqli_report(MYSQLI_REPORT_ALL);
    
        try {
            // Iniciar transacción
            $result = $this->conectar->query("START TRANSACTION;");
            // Ejecutar procedimiento almacenado
            $result = $this->conectar->query("Call spVentas('$idCliente','$Total','$idCosto','$CostoEnv','$TotalVenta',@idV);");
            // Obtener el id de la venta generado por el procedimiento almacenado
            $salida_idV = $this->conectar->query("Select @idV as idV;");
            $row = $salida_idV->fetch_assoc();
            $idVenta = $row['idV'];
            // Aquí podrías realizar cualquier otra acción o guardar más datos en la base de datos si es necesario.
            // Confirmar la transacción
            $result = $this->conectar->query("COMMIT;");
            // Devolver el id de la venta generado por el procedimiento almacenado
            // return $idVenta;
            foreach ($carro as $datos) {

                $idP = $datos['idP'];
                $Cant = $datos['Cant'];
                $Precio = $datos['Precio'];
                $Subt = $datos['Subtotal'];
                $result = $this->conectar->query("Call spVentaDetalle('$idVenta','$idP','$Precio','$Cant','$Subt');");
            }
            $datosReporte = array(
                'idVenta' => $idVenta,
                'idCliente' => $idCliente,
                'TotalVenta' => $TotalVenta,
                'carro' => $carro,
                // Agrega aquí los demás datos que necesites para el reporte
            );
            
            // Retornar el array con los datos
            return $datosReporte;
        } catch (mysqli_sql_exception $e) {
            // Si ocurre una excepción, deshacer la transacción para evitar cambios en la base de datos
            $this->conectar->query("ROLLBACK;");
            throw $e;
        }
    }
    
}
?>