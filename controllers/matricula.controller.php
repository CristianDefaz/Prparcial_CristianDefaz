<?php
error_reporting(0);
// TODO: Requerimientos
//require_once('../config/sesiones.php');
require_once('../models/matricula.model.php');
$Matricula = new MatriculaModel;
//error_reporting(0); echo  $_SESSION["em_id"];
switch ($_GET['op']) {

    case 'todos':
        $todos = array();
        $datos = $Matricula ->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

        case 'uno':
            $idmatricula = $_POST['id_matricula'];
            $datos = array();
            $datos = $Matricula->uno($idmatricula);
            $respuesta = mysqli_fetch_assoc($datos);
            echo json_encode($respuesta);
            break;

    case 'insertar':
        $estudiante = $_POST['id_estudiante'];
        $curso = $_POST['id_curso'];
        $datos = array();
        $datos = $Matricula->Insertar($estudiante, $curso);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $idmatricula= $_POST['id_matricula'];
        $estudiante = $_POST['id_estudiante'];
        $curso = $_POST['id_curso'];
        $datos = array();
        $datos = $Matricula->Actualizar($idmatricula, $estudiante, $curso);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $idmatricula = $_POST['id_matricula'];
        $datos = array();
        $datos = $Matricula->Eliminar($idmatricula);
        echo json_encode($datos);
        break;
        
}
