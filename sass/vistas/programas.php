<?php
    include "header.php";
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1) {
?>

<!-- Contenido de la página -->
<div class="container-fluid" id="midiv">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw-light">Administrar Programas</h1>
            <p class="lead">
                <button class="btn btn-primary btn-l" data-bs-toggle="modal" data-bs-target="#modalAgregarPrograma">
                    Agregar nuevo programa
                </button>

                <hr>
                <div id="tablaProgramasLoad"></div>
                <button class="btn btn-primary btn-l" data-bs-toggle="modal" data-bs-target="#modalAsignarPrograma">
                    Asignar programa
                </button>
            </p>
        </div>
    </div>
</div>

<?php

        include "usuarios/modalAgregarPrograma.php";
        include "usuarios/modalAsignarPrograma.php";
        include "usuarios/modalActualizarPrograma.php";
        include "footer.php";
    ?>
<script src="../public/js/usuarios/programas.js"></script>
<?php
        } else {
            header("location:../index.php");
        }
    ?>