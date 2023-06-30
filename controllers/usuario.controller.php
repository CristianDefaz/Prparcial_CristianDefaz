<?php
//error_reporting(0);
// TODO: Requerimientos
require_once('../config/sesiones.php');
require_once('../models/usuarios.model.php');
$Usuario = new UsuarioModel;

switch ($_GET['op']) {
    case 'login':
        $usu_correo = $_POST['usu_correo'];
        $usu_contrasena = $_POST['usu_contrasena'];

        if (empty($usu_correo) || empty($usu_contrasena)) {
            header("Location:../index.php?op=2");
            exit();
        }

        $datos = $Usuario->login($usu_correo, $usu_contrasena);
        $res = mysqli_fetch_assoc($datos);

        try {
            if (is_array($res) && count($res) > 0) {
                $_SESSION['id_usuario'] = $res['id_usuario'];
                $_SESSION['usu_nombre'] = $res['usu_nombre'];
                $_SESSION['usu_apellido'] = $res['usu_apellido'];
                $_SESSION['usu_cedula'] = $res['usu_cedula'];
                $_SESSION['usu_telefono'] = $res['usu_telefono'];
                $_SESSION['usu_correo'] = $res['usu_correo'];
                $_SESSION['usu_contrasena'] = $res['usu_contrasena'];
                $_SESSION['id_rol'] = $res['id_rol'];
                $_SESSION['rol_nombre'] = $res['rol_nombre'];

                header('Location:../views/Dashboard/home.php');
                exit();
            } else {
                header("Location:../index.php?op=1");
                exit();
            }
        } catch (Throwable $th) {
            echo json_encode($th->getMessage());
        }
        break;

    case 'todos':
        $todos = array();
        $datos = $Usuario->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

        case 'uno':
            $idusuario = $_POST['id_usuario'];
            $datos = array();
            $datos = $Usuario->uno($idusuario);
            $respuesta = mysqli_fetch_assoc($datos);
            echo json_encode($respuesta);
            break;

    case 'insertar':
        $Nombres = $_POST['usu_nombre'];
        $Apellidos = $_POST['usu_apellido'];
        $cedula = $_POST['usu_cedula'];
        $telefono = $_POST['usu_telefono'];
        $usu_correo = $_POST['usu_correo'];
        $usu_contrasena = $_POST['usu_contrasena'];
        $idRoles = $_POST['id_rol'];
        $datos = array();
        $datos = $Usuario->Insertar($Nombres, $Apellidos, $cedula, $telefono, $usu_correo, $usu_contrasena, $idRoles);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $idusuario = $_POST['id_usuario'];
        $Nombres = $_POST['usu_nombre'];
        $Apellidos = $_POST['usu_apellido'];
        $cedula = $_POST['usu_cedula'];
        $telefono = $_POST['usu_telefono'];
        $usu_correo = $_POST['usu_correo'];
        $usu_contrasena = $_POST['usu_contrasena'];
        $idRoles = $_POST['id_rol'];
        $datos = array();
        $datos = $Usuario->Actualizar($idusuario, $Nombres, $Apellidos, $cedula, $telefono, $usu_correo, $usu_contrasena, $idRoles);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $idusuario = $_POST['id_usuario'];
        $datos = array();
        $datos = $Usuario->Eliminar($idusuario);
        echo json_encode($datos);
        break;
}
