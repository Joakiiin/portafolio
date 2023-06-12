<?php
    include "header.php";
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1 || $_SESSION['usuario']['rol'] == 2) {

        $idUsuario = $_SESSION['usuario']['id'];
?>

<!-- Contenido de la página -->
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw-light">Bienvenido <b>
                    <?php echo $_SESSION['usuario']['nombre']; ?>
                </b> </h1>
            <p class="lead">
                <hr>
                <div class="card text-bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header"> <b> Datos personales </b> </div>
                    <div class="card-body">
                        <div class="card-text col-sm"> <b> Apellido paterno: </b> <span id="paterno"> </span> </div>
                        <div class="card-text col-sm"> <b> Apellido materno: </b> <span id="materno"> </span> </div>
                        <div class="card-text col-sm"> <b> Nombre: </b> <span id="nombre"> </span> </div>
                        <div class="card-text col-sm"> <b> Teléfono: </b> <span id="telefono"> </span> </div>
                        <div class="card-text col-sm"> <b> Correo: </b> <span id="correo"> </span> </div>
                        <div class="card-text col-sm"> <b> Edad: </b> <span id="edad"> </span> </div>
                    </div>
                    <div class="card-footer"><div class="card-text col-sm"> <b> Fecha de registro al sistema: </b> <span id="fechaRegistro"> </span> </div></div>
                </div>
            </p>
        </div>
    </div>
</div>

<?php
        
        include "footer.php"; 
    ?>

<script src="../public/js/inicio/personales.js"></script>
<script>
    let idUsuario = '<?php echo $idUsuario; ?>';
    datosPersonalesInicio(idUsuario);
</script>

<?php
        } else {
            header("location:../index.php");
        }
    ?>