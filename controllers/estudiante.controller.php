<?php
error_reporting(0);
// TODO: Requerimientos
//require_once('../config/sesiones.php');
require_once('../models/estudiante.model.php');
$Estudiante = new EstudianteModel;
//error_reporting(0); echo  $_SESSION["em_id"];
switch ($_GET['op']) {

    case 'todos':
        $todos = array();
        $datos = $Estudiante->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

        case 'uno':
            $idestudiante = $_POST['id_estudiante'];
            $datos = array();
            $datos = $Estudiante->uno($idestudiante);
            $respuesta = mysqli_fetch_assoc($datos);
            echo json_encode($respuesta);
            break;

    case 'insertar':
        $cedula = $_POST['es_cedula'];
        $Nombres = $_POST['es_nombre'];
        $datos = array();
        $datos = $Estudiante->Insertar($cedula, $Nombres);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $idestudiante = $_POST['id_estudiante'];
        $cedula = $_POST['es_cedula'];
        $Nombres = $_POST['es_nombre'];
        $datos = array();
        $datos = $Estudiante->Actualizar($idestudiante, $cedula, $Nombres);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $idestudiante = $_POST['id_estudiante'];
        $datos = array();
        $datos = $Estudiante->Eliminar($idestudiante);
        echo json_encode($datos);
        break;


        
}
