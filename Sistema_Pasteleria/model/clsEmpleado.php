<?php
include_once 'model/clsConexion.php';

class clsEmpleado extends clsConexion
{
    public function AltaEmpleado($nombre, $AP, $AM, $Correo, $NoTel, $Usuario, $pass)
    {
        $sql = "CALL Sp_InsertEmployee('$nombre','$AP','$AM','$Correo','$NoTel','$Usuario','$pass');";
        $resultado = $this->conectar->query($sql);
        return $resultado;
    }
    public function Actualizar($IdUser, $Nombre, $AP, $AM, $Correo, $NoTel, $Usuario, $pass)
    {
        $sql = "CALL Sp_UpdateEmployee('$Nombre', '$AP', '$AM', '$Correo', '$NoTel', '$Usuario', '$pass','$IdUser');";
        $resultado = $this->conectar->query($sql);
        return $resultado;
    }
    public function Eliminar($IdEm)
    {
        $sql = "CALL Sp_DeleteEmployee($IdEm);";
        $resultado = $this->conectar->query($sql);
        return $resultado;
    }
    public function ConsultaEmpleado()
    {
        $sql = "CALL Sp_QueryEmployee()";
        $resultado = $this->conectar->query($sql);
        return $resultado;
    }
    public function ConsultaEmpleado_By_ID($id)
    {
        $sql = "CALL  traeUsuarioCXEBy_ID($id)";
        $resultado = $this->conectar->query($sql);
        return $resultado;
    }
}
