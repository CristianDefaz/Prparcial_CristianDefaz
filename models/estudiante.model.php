<?php
//TODO: archivos requeridos
require_once('../config/config.php');
//require_once('../models/empleadosroles.model.php');

class EstudianteModel
{

   public function todos()
    {
        $con = new ClaseConexion();
        $con=$con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `estudiantes`";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }

    public function Insertar($cedula, $Nombres) {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `estudiantes`(`es_cedula`, `es_nombre`) VALUES ('$cedula', '$Nombres')";
        if (mysqli_query($con, $cadena)) {
            return 'ok';
        } else {
            return mysqli_error($con);
        }
    }
    
    public function uno($idestudiante){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT *FROM `estudiantes` where id_estudiante=$idestudiante";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }

    public function Actualizar($idestudiante, $cedula, $Nombres) {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `estudiantes` SET `es_cedula`='$cedula', `es_nombre`='$Nombres' WHERE id_estudiante=$idestudiante";
        if (mysqli_query($con, $cadena)) {
            return 'ok';
        } else {
            return mysqli_error($con);
        }
    }
    
    public function Eliminar($idestudiante){
        $con = new ClaseConexion();
        $con=$con->ProcedimientoConectar();
        $cadena = "DELETE FROM `estudiantes` WHERE id_estudiante=$idestudiante";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
           
            return mysqli_error($con);
        }
    }
}