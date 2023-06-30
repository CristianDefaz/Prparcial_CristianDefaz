<?php
error_reporting(0);
// TODO: Requerimientos
//require_once('../config/sesiones.php');
require_once('../models/cursos.model.php');
$Cursos = new CursosModel;
//error_reporting(0); echo  $_SESSION["em_id"];
switch ($_GET['op']) {

    case 'todos':
        $todos = array();
        $datos = $Cursos ->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

        case 'uno':
            $idcurso = $_POST['id_curso'];
            $datos = array();
            $datos = $Cursos->uno($idcurso);
            $respuesta = mysqli_fetch_assoc($datos);
            echo json_encode($respuesta);
            break;

    case 'insertar':
        $materia = $_POST['materia'];
        $idprofe = $_POST['id_profesor'];
        $datos = array();
        $datos = $Cursos->Insertar($materia, $idprofe);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $idcurso= $_POST['id_curso'];
        $materia = $_POST['materia'];
        $idprofe = $_POST['id_profesor'];
        $datos = array();
        $datos = $Cursos->Actualizar($idcurso, $materia, $idprofe);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $idcurso = $_POST['id_curso'];
        $datos = array();
        $datos = $Cursos->Eliminar($idcurso);
        echo json_encode($datos);
        break;


        
}
