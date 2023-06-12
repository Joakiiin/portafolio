<?php
    include "header.php";
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {
?>

<!-- Contenido de la página -->
<div class="container">
    
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw-light">Subir Evaluación/Reporte Bimestrales</h1>
            <br>
            <div class="row">
                <div class="col-sm-3">
                    <div class="card" style="width: 15rem;">
                        <center>
                        <img src="../public/img/carpetaArchivos.png" class="card-img-top cardFile" style="width: 120px">
                        <div class="card-body">
                            <h5 class="card-title">Primera evaluación</h5>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSubir1">Subir</a>
                        </div>
                        </center>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card" style="width: 15rem;">
                        <center>
                            <img src="../public/img/carpetaArchivos.png" class="card-img-top cardFile" style="width: 120px">
                            <div class="card-body">
                                <h5 class="card-title">Segunda evaluación</h5>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSubir2">Subir</a>
                            </div>
                        </center>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card" style="width: 15rem;">
                        <center>
                            <img src="../public/img/carpetaArchivos.png" class="card-img-top cardFile" style="width: 120px">
                            <div class="card-body">
                                <h5 class="card-title">Tercera evaluación</h5>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSubir3">Subir</a>
                            </div>
                        </center>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card" style="width: 15rem;">
                        <center>
                            <img src="../public/img/carpetaArchivos.png" class="card-img-top cardFile" style="width: 120px">
                            <div class="card-body">
                                <h5 class="card-title">Evaluación final</h5>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSubir4">Subir</a>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php 
    include "reportes/modalSubir1.php";
    include "reportes/modalSubir2.php";
    include "reportes/modalSubir3.php";
    include "reportes/modalSubir4.php";
    
    include "footer.php";
    
    ?>

    <?php
        } else {
            header("location:../index.php");
        }
    ?>