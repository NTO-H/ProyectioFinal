<?php
include_once 'model/clsconexion.php';

class clsProducto extends clsconexion
{

    public function AltaProducto($Nombre, $idSabor, $Precio, $Imagen, $tipo)
    {

        $sql = "call Sp_InsertProduct ('$Nombre',$idSabor,$Precio,'$Imagen',$tipo);";
        $resultado = $this->conectar->query($sql);
        return $resultado;
    }


    public function Actualizar($Nombre, $Sabor, $Precio, $Imagen, $tipo, $No)
    {
        // $sql = "call SP_UpdateXPro($Nombre,$Sabor, $Precio, $Imagen,$tipo ,$No); ";
        $sql = "UPDATE tblproducto 
        SET `Nombre`='$Nombre',`idSabor`=$Sabor,`Precio`=$Precio,`imagen`='$Imagen',`tipo`=$tipo 
        WHERE `idProducto`=$No ";
        $resultado = $this->conectar->query($sql);
    }


    public function Eliminar($No)
    {

        $sql = "call Sp_DeleteProduct($No);";
        $resultado = $this->conectar->query($sql);
        return $resultado;
    }


    public function ConsultaProducto()
    {

        $sql = "CALL Sp_ConsultaProductoTipoTresLeches";
        $resultado = $this->conectar->query($sql);
        return $resultado;
    }
   
   
   
    public function ConsultarProductosPanormal()
    {

        $sql = "CALL Sp_ConsultaProductoTipoPanNormal";
        $resultado = $this->conectar->query($sql);
        return $resultado;
    }

    
    public function ConsultaPastelXSabor()
    {
        $sql = "call Sp_QueryProductXSabor";
        $resultado = $this->conectar->query($sql);
        return $resultado;
    }
    public function Comprar($Cant, $Prec, $descuen)
    {
        $sql = "insert into tbldetalleventa (Cantidad,precio,descuento)vaues($Cant,$Prec,$descuen)";
        $resultado = $this->conectar->query($sql);
    }
    public function consultaSabor()
    {
        $sql = "CALL Sp_ConsultaSabor;";
        $resultado = $this->conectar->query($sql);
        return $resultado;
    }
    public function ConsultaTipoPatel()
    {
        $sql = "CALL    Sp_ConsultaTipo;";
        $resultado = $this->conectar->query($sql);
        return $resultado;
    }
    public function ConsultaProductoByID($id)
    {

        $sql = "CALL `traeProductoid`($id)";
        $resultado = $this->conectar->query($sql);

        return $resultado;
    }

    public function tabla_pro()
    {
        $result = $this->conectar->multi_query("CALL `consulta_all_productos`");
        if ($result) {
            $res = $this->conectar->store_result()->fetch_assoc();
            $this->conectar->next_result(); // Avanzar al siguiente resultado
            return $res;
        } else {
            return $result;
        }
    }
    public function traenombre_imageBy_id($id)
    {
        $result = $this->conectar->query("CALL ObtenerNombreImagen($id);");

        // Verificar si la consulta no es nula
        if ($result->num_rows > 0) {
            $res = $result->fetch_assoc();
            return $res;
        } else {
            return null; // O algún otro valor para indicar que la consulta es nula
        }
    }

    // Trae el producto por su id:lau
    public function traeProducto_By_id($id)
    {
        $result = $this->conectar->multi_query("CALL traeProductoid($id);");
        if ($result) {
            $res = $this->conectar->store_result()->fetch_assoc();
            $this->conectar->next_result(); // Avanzar al siguiente resultado
            return $res;
        } else {
            return $result;
        }
    }
    public function TraeLocalidad_Costo()
    {
    
        $sql = "CALL Sp_listaDireccion";
        $resultado = $this->conectar->query($sql);
    
        return $resultado;
    }

    public function ConsultarCoincidenciaNombre($Palabra)
	{
		$sql = "CALL SP_BuscarCoincidencia('$Palabra');";

		$resultado = $this->conectar->query($sql);

		return $resultado;
	}
 
 
    public function TraeCosto_ID_localidad($id)
    {
    
        $sql = "CALL Sp_Seleciona_loc_ByID($id);";
        $resultado = $this->conectar->query($sql);
    
        return $resultado;
    }

}
