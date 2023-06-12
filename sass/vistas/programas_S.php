<?php
    include "header.php";
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1) {
?>

<!-- Contenido de la página -->
<div class="container-fluid" id="midiv">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw-light">Programas Asignados</h1>
            <p class="lead">
                <hr>
                <div id="tablaAsignadosLoad"></div>
            </p>
        </div>
    </div>
</div>

<?php

        include "usuarios/modalAsignarPrograma_S.php";
        include "footer.php";
    ?>

<script src="../public/js/usuarios/programas_S.js"></script>
<?php
        } else {
            header("location:../index.php");
        }
    ?>