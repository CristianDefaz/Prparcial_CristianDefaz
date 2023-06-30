<?php
include_once('../../config/sesiones.php');
if (isset($_SESSION["id_usuario"])) {
    $_SESSION["ruta"] = "Usuarios";
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php require_once('../html/head.php')  ?>
</head>
<body id="page-top">
<!-- Nav-->

<?php include_once('../html/header.php')  ?>
<div id="layoutSidenav">
        <div id="layoutSidenav_nav">
             <?php  include_once('../html/menu.php') ?>
        </div>
        <div id="layoutSidenav_content">

                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Usuario</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">__________</li>
                        </ol>
                        <div class="row justify-content-end mb-3">
                            <div class="col-xl-6">
                            <button type="button" onclick="cargaSelectRoles()" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#Modalusuario">Nuevo Usuario </button>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabla
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-striped-columns">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Cedula</th>
                                                <th>Telefono</th>
                                                <th>Correo</th>
                                                <th>Rol</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="TablaUsuario">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>    
            <?php  include_once('../html/footer.php') ?>
            </div>
                   <!-- Modal -->
                    <div class="modal fade" id="Modalusuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="titulomodalusuario">Ingresar usuario</h1>
                                        <button type="button" onclick="limpiar()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <form id="usuarios_form">
                                        <div class="modal-body">
                                                    <input type="hidden" name="id_usuario" id="id_usuario">
                                                    
                                                        <div class="form-group">
                                                            <label for="usu_nombre" class="control-label"> -Nombres</label>
                                                            <input type="text" name="usu_nombre" id="usu_nombre" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="usu_apellido" class="control-label"> -Apellidos</label>
                                                            <input type="text" name="usu_apellido" id="usu_apellido" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="usu_cedula" class="control-label"> -Cedula</label>
                                                            <input type="text" name="usu_cedula" id="usu_cedula" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="usu_telefono" class="control-label"> -Telefono</label>
                                                            <input type="text" name="usu_telefono" id="usu_telefono" class="form-control" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="usu_correo" class="control-label"> -Correo</label>
                                                            <input type="mail" name="usu_correo" id="usu_correo" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="usu_contrasena" class="control-label"> -Contrasena</label>
                                                            <input type="text" name="usu_contrasena" id="usu_contrasena" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="id_rol" class="control-label"> -Rol</label>
                                                            <select name="id_rol" id="id_rol" class="form-control"> 
                                                            </select>
                                                        </div>                         
                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                                            <button type="button" class="btn btn-secondary" onclick="limpiar()" data-bs-dismiss="modal">Cerrar</button>     
                                                        </div> 
                                    </form>
                                </div>
                            </div>
                        </div>              
                    </div>       
            <!--scripts-->
            <?php include_once('../html/scripts.php')  ?>
            <script src="./usuario.js"></script> 
</body>

</html>
<?php
} else {
    header('Location:../../index.php');
}
?>