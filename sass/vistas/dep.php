<?php
    include "header.php";
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1) {
?>

<!-- Contenido de la página -->
<div class="container-fluid">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw-light">Administrar Dependencias</h1>
            <p class="lead">
                <button class="btn btn-primary btn-l" data-bs-toggle="modal" data-bs-target="#modalAgregarDep">
                    Agregar nuevo usuario
                </button>

                <hr>
                <div id="tablaDependenciasLoad"></div>

            </p>
        </div>
    </div>
</div>

<?php

        include "usuarios/modalAgregarDep.php";
        include "usuarios/modalActualizarDep.php";
        include "usuarios/modalCambiarPassword.php";
        include "footer.php";
    ?>

<script src="../public/js/usuarios/dependencias.js"></script>
<?php
        } else {
            header("location:../index.php");
        }
    ?>