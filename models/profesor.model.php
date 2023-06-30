<?php
//TODO: archivos requeridos
require_once('../config/config.php');
//require_once('../models/empleadosroles.model.php');

class ProfesorModel
{

   public function todos()
    {
        $con = new ClaseConexion();
        $con=$con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `profesores`";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }

    public function Insertar($cedula, $Nombres) {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `profesores`(`pro_cedula`, `pro_nombre`) VALUES ('$cedula', '$Nombres')";
        if (mysqli_query($con, $cadena)) {
            return 'ok';
        } else {
            return mysqli_error($con);
        }
    }
    
    public function uno($idprofesor){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT *FROM `profesores` where id_profesor=$idprofesor";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }

    public function Actualizar($idprofesor, $cedula, $Nombres) {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `profesores` SET `pro_cedula`='$cedula', `pro_nombre`='$Nombres' WHERE id_profesor=$idprofesor";
        if (mysqli_query($con, $cadena)) {
            return 'ok';
        } else {
            return mysqli_error($con);
        }
    }
    
    public function Eliminar($idprofesor){
        $con = new ClaseConexion();
        $con=$con->ProcedimientoConectar();
        $cadena = "DELETE FROM `profesores` WHERE id_profesor=$idprofesor";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
           
            return mysqli_error($con);
        }
    }
}