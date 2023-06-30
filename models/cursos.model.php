<?php
//TODO: archivos requeridos
require_once('../config/config.php');
//require_once('../models/empleadosroles.model.php');

class CursosModel
{

   public function todos()
    {
        $con = new ClaseConexion();
        $con=$con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `cursos` INNER JOIN profesores on cursos.id_profesor= profesores.id_profesor ORDER BY id_curso";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }

    public function Insertar($materia, $idprofe) {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `cursos`(`materia`, `id_profesor`) VALUES ('$materia','$idprofe')";
        if (mysqli_query($con, $cadena)) {
            return 'ok';
        } else {
            return mysqli_error($con);
        }
    }
    
    public function uno($idcurso){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT *FROM `cursos` where id_curso=$idcurso";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }

    public function Actualizar($idcurso, $materia, $idprofe) {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `cursos` SET `materia`='$materia', `id_profesor`='$idprofe' WHERE id_curso=$idcurso";
        if (mysqli_query($con, $cadena)) {
            return 'ok';
        } else {
            return mysqli_error($con);
        }
    }
    
    public function Eliminar($idcurso){
        $con = new ClaseConexion();
        $con=$con->ProcedimientoConectar();
        $cadena = "DELETE FROM `cursos` WHERE id_curso=$idcurso";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
           
            return mysqli_error($con);
        }
    }
}