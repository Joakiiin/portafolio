<?php
    include "header.php";
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {
?>

<style>
    img {
        height: 230px;
    }

    h5 {
        color: red;
    }
</style>

<!-- Contenido de la página -->
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw-light">Contáctos</h1>
            <p class="lead">
                <center>
                    <h5> Sí presentas algún problema dentro del sistema puedes recurrir a los siguientes contactos </h5>
                </center>
            </p>
            <hr>
            <div class="row ">
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="../public/img/usuario.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"> <center> Ramírez Sánchez Andrea Lizeet </center> </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="../public/img/usuario.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"> <center> Mancilla Bernal Edgar </center> </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="../public/img/usuario.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"> <center> Ramírez Rosales Iván </center> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

<?php
        } else {
            header("location:../index.php");
        }
    ?>