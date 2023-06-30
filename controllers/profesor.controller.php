<?php
error_reporting(0);
// TODO: Requerimientos
//require_once('../config/sesiones.php');
require_once('../models/profesor.model.php');
$Profesor = new ProfesorModel;
//error_reporting(0); echo  $_SESSION["em_id"];
switch ($_GET['op']) {

    case 'todos':
        $todos = array();
        $datos = $Profesor->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

        case 'uno':
            $idprofesor = $_POST['id_profesor'];
            $datos = array();
            $datos = $Profesor->uno($idprofesor);
            $respuesta = mysqli_fetch_assoc($datos);
            echo json_encode($respuesta);
            break;

    case 'insertar':
        $cedula = $_POST['pro_cedula'];
        $Nombres = $_POST['pro_nombre'];
        $datos = array();
        $datos = $Profesor->Insertar($cedula, $Nombres);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $idprofesor= $_POST['id_profesor'];
        $cedula = $_POST['pro_cedula'];
        $Nombres = $_POST['pro_nombre'];
        $datos = array();
        $datos = $Profesor->Actualizar($idprofesor, $cedula, $Nombres);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $idprofesor = $_POST['id_profesor'];
        $datos = array();
        $datos = $Profesor->Eliminar($idprofesor);
        echo json_encode($datos);
        break;


        
}
