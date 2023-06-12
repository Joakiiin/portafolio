<?php 
include("header.php");
if (isset($_SESSION['alumno']) && 
 $rol == 1 || $rol == 2 
 || $rol == 3 || $rol == 4
 || $rol == 5) 
    {
 ?>

        <br>
        <br>

        <!--Contenido principal-->
        <center>
            <h2 class="text-break"><b>Servicio de Automatización del Servicio Social</b></h2>
        </center><br>
        <div class="row justify-content-evenly" style="height: 300px;">
            <div class="col-4 align-self-center text-center">
                <img src="img/logo_calidad.jpg" class="img-fluid" alt="...">
            </div>
            <div class="col-4 align-self-center text-center">
                <div class="card text-bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header">Avisos</div>
                    <div class="card-body">
                        <h5 class="card-title">Warning card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>

        <br>

<?php include("includes/footerSesion.php"); 
} else {
    header("location:index.php");
}
?>