<?php
include_once('../../config/sesiones.php');
if (isset($_SESSION["id_usuario"])) {
    $_SESSION["ruta"] = "Matriculas";
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
                        <h1 class="mt-4">Matriculas</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">__________</li>
                        </ol>
                        <div class="row justify-content-end mb-3">
                            <div class="col-xl-6">
                            <button type="button" onclick="cargatipo()" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#Modallenado">Nuevo Matriculas </button>
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
                                                <th>Estudiante</th>
                                                <th>Cedula estudiante</th>
                                                <th>Curso</th>                                                 
                                                <th>Profesor</th>
                                            </tr>
                                        </thead>
                                        <tbody id="Tablallendo">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>    
            <?php  include_once('../html/footer.php') ?>
            </div>
                   <!-- Modal -->
                    <div class="modal fade" id="Modallenado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="titulomodallenado">Ingresar profesor</h1>
                                        <button type="button" onclick="limpiar()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <form id="Llenado_form">
                                        <div class="modal-body">
                                                <input type="hidden" name="id_matricula" id="id_matricula">

                                                <div class="form-group">
                                                            <label for="id_estudiante" class="control-label"> -Estudiante</label>
                                                            <select name="id_estudiante" id="id_estudiante" class="form-control"> 
                                                            </select>
                                                </div>     

                                                <div class="form-group">
                                                            <label for="id_curso" class="control-label"> -Curso</label>
                                                            <select name="id_curso" id="id_curso" class="form-control"> 
                                                            </select>
                                                </div>                                                                     
                                        </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                                <button type="button" class="btn btn-secondary" onclick="limpiar()" data-bs-dismiss="modal">Cerrar</button>     
                                                <a href="../estudiante/estudiante.php" class="btn btn-primary">Agregar Estudiante</a>


                                            </div> 
                                    </form>
                                </div>
                            </div>
                        </div>              
                    </div>       
            <!--scripts-->
            <?php include_once('../html/scripts.php')  ?>
            <script src="./matriculas.js"></script> 
</body>

</html>
<?php
} else {
    header('Location:../../index.php');
}
?>