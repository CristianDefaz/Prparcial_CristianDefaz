<?php
//TODO: archivos requeridos
require_once('../config/config.php');
//require_once('../models/empleadosroles.model.php');

class MatriculaModel
{

   public function todos()
    {
        $con = new ClaseConexion();
        $con=$con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `matricula` INNER JOIN estudiantes on matricula.id_estudiante= estudiantes.id_estudiante INNER JOIN cursos on matricula.id_curso = cursos.id_curso INNER JOIN profesores on cursos.id_profesor = profesores.id_profesor ORDER BY id_matricula";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }

    public function Insertar($estudiante, $curso) {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `matricula`(`id_estudiante`, `id_curso`) VALUES ('$estudiante','$curso')";
        if (mysqli_query($con, $cadena)) {
            return 'ok';
        } else {
            return mysqli_error($con);
        }
    }
    
    public function uno($idmatricula){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT *FROM `matricula` where id_matricula=$idmatricula";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }

    public function Actualizar($idmatricula, $estudiante, $curso) {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `matricula` SET `id_estudiante`='$estudiante', `id_curso`='$curso' WHERE id_matricula=$idmatricula";
        if (mysqli_query($con, $cadena)) {
            return 'ok';
        } else {
            return mysqli_error($con);
        }
    }
    
    public function Eliminar($idmatricula){
        $con = new ClaseConexion();
        $con=$con->ProcedimientoConectar();
        $cadena = "DELETE FROM `matricula` WHERE id_matricula=$idmatricula";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
           
            return mysqli_error($con);
        }
    }
}