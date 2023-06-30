<?php
//TODO: archivos requeridos
require_once('../config/config.php');
//require_once('../models/empleadosroles.model.php');

class UsuarioModel
{
    public function login($usu_correo, $usu_contrasena)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM usuario WHERE usu_correo = '$usu_correo' and usu_contrasena='$usu_contrasena'";
        print $cadena;
        $datos = mysqli_query($con, $cadena);
        return $datos;
   }

   public function todos(){
    $con = new ClaseConexion();
    $con = $con->ProcedimientoConectar();
    $cadena = "SELECT * FROM usuario INNER JOIN rol on usuario.id_rol = rol.id_rol ORDER BY usu_apellido";
    $datos = mysqli_query($con, $cadena);
    return $datos;
}

public function Insertar($Nombres, $Apellidos, $cedula, $telefono, $usu_correo, $usu_contrasena, $idRoles) {
    $con = new ClaseConexion();
    $con = $con->ProcedimientoConectar();
    $cadena = "INSERT INTO `usuario`(`usu_nombre`, `usu_apellido`, `usu_cedula`, `usu_telefono`, `usu_correo`, `usu_contrasena`, `id_rol`) VALUES ('$Nombres', '$Apellidos', '$cedula', '$telefono', '$usu_correo', '$usu_contrasena', '$idRoles')";
    if (mysqli_query($con, $cadena)) {
        return 'ok';
    } else {
        return mysqli_error($con);
    }
}
    public function uno($idusuario){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT *FROM `usuario` where id_usuario=$idusuario";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    public function Actualizar($idusuario,$Nombres, $Apellidos,$cedula, $telefono, $usu_correo, $usu_contrasena, $idRoles){
        $con = new ClaseConexion();
        $con=$con->ProcedimientoConectar();
        $cadena = "UPDATE `usuario` SET `usu_nombre`='$Nombres',`usu_apellido`='$Apellidos',`usu_cedula`='$cedula',`usu_telefono`='$telefono',`usu_correo`='$usu_correo',`usu_contrasena`='$usu_contrasena',`id_rol`='$idRoles' WHERE id_usuario=$idusuario";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        }
    }
    public function Eliminar($idusuario){
        $con = new ClaseConexion();
        $con=$con->ProcedimientoConectar();
        $cadena = "DELETE FROM `usuario` WHERE id_usuario=$idusuario ";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
           
            return mysqli_error($con);
        }
    }
}