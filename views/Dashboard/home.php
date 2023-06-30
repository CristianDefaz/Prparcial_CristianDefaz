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
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Menu principal</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Menu</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Estudiantes</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="../estudiante/estudiante.php">Vista tabla estudiante</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Profesores</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="../profesor/profesor.php">Vista tabla Profesores</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Cursos</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="../cursos/cursos.php">Vista tabla Cursos</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Matriculas</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="../matriculas/matriculas.php">Vista tabla Matriculas</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Estudio
                                    </div>
                                    <div class="card-body  d-flex justify-content-center">
                                    <!-- Aquí se agrega la imagen -->
                                    <img src="https://w7.pngwing.com/pngs/965/598/png-transparent-case-study-desktop-study-skills-blog-others-miscellaneous-company-service-thumbnail.png" alt="Descripción de la imagen">
                                </div>
                                </div>
                            </div>
                            <div class="col-xl-6">

                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Confianza
                                </div>
                                <div class="card-body">
                                    <!-- Aquí se agrega la imagen -->
                                    <img src="https://empresas.divulgaciondinamica.es/wp-content/uploads/2019/11/crowd-3513215__480.jpg" alt="Descripción de la imagen">
                                </div>
                            </div>


                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                               
                            </div>
                        </div>
                    </div>
                </main>
                <?php  include_once('../html/footer.php') ?>
            </div>
 </div>
  <!--scripts-->
  <?php include_once('../html/scripts.php')  ?>
    
</body>

</html>
