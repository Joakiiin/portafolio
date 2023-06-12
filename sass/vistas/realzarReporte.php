<?php
    include "header.php";
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {
?>

<!-- Contenido de la página -->
<div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="fw-light">Realizar Evaluación/Reporte Bimestrales</h1>

                <div class="container text-center">
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary" style="height: 65px;" data-bs-toggle="modal" data-bs-target="#modalAutoevaluacion1">Realizar 1ra. autoevaluación</button>
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary" style="height: 65px;">Realizar 1ra. evaluación del servicio</button>
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary" style="height: 65px;">Realizar 1er. reporte bimestral</button>
                        </div>
                    </div>

                    <br>

                    <div class="row justify-content-center">
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary" style="height: 65px;" data-bs-toggle="modal" data-bs-target="#modalAutoevaluacion2">Realizar 2da. autoevaluación</button>
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary" style="height: 65px;">Realizar 2da. evaluación del servicio</button>
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary" style="height: 65px;">Realizar 2do. reporte bimestral</button>
                        </div>
                    </div>

                    <br>

                    <div class="row justify-content-center">
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary" style="height: 65px;" data-bs-toggle="modal" data-bs-target="#modalAutoevaluacion3">Realizar 3ra. autoevaluación</button>
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary" style="height: 65px;">Realizar 3ra. evaluación del servicio</button>
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary" style="height: 65px;">Realizar 3er. reporte bimestral</button>
                        </div>
                    </div>

                    <br>

                    <div class="row justify-content-center">
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary" style="height: 65px;">Realizar autoevaluación final</button>
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary" style="height: 65px;">Realizar evaluación final del servicio</button>
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary" style="height: 65px;">Realizar reporte final bimestral</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        include "reportes/modalAutoevluacion1.php";
        include "reportes/modalAutoevluacion2.php";
        include "reportes/modalAutoevluacion3.php";
        include "footer.php";
    ?>

    <?php
        } else {
            header("location:../index.php");
        }
    ?>