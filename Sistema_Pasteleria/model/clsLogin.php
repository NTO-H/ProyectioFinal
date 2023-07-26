<?php
include_once 'model/clsConexion.php';

class clsLogin extends clsconexion
{
    public function buscausuario($usuario, $password)
    {
        $sql = "call Sp_access('$usuario','$password');";
        $resultado = $this->conectar->query($sql);
        return $resultado;
    }
    public function traeusuario($usuario, $password)
    {
        $sql = "call Sp_Trae_Usuario('$usuario','$password');";
        $resultado = $this->conectar->query($sql);
        return $resultado;
    }
}
