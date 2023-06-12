<?php
    include "header.php";
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1) {
?>

<!-- Contenido de la página -->
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw-light">Administrar usuarios</h1>
            <p class="lead">
                <button class="btn btn-primary btn-l" data-bs-toggle="modal" data-bs-target="#modalAgregarUsuarios">
                    Agregar nuevo usuario
                </button>

                <hr>
                <div id="tablaUsuariosLoad"></div>

            </p>
        </div>
    </div>
</div>

<?php
        include "usuarios/modalActualizarPassword.php";
        include "usuarios/modalActualizar.php";
        include "usuarios/modalAgregar.php";
        include "usuarios/modalAgregarAlumno.php";
        include "footer.php";
    ?>

<script src="../public/js/usuarios/usuarios.js"></script>

<?php
        } else {
            header("location:../index.php");
        }
    ?>