<?php 
include("header.php");
if (isset($_SESSION['alumno']) && 
 $rol == 1 || $rol == 2 
 || $rol == 3 || $rol == 4
 || $rol == 5) 
    {
        $NoControl= $_SESSION['alumno']['nocontrol'];
 ?>
        <br>
        <br>

        <!--Contenido principal-->
        <center>
            <h2 class="text-break"><b>Datos de Dependencia</b></h2>
        </center>
        
        <br>

        <div class="row text-center">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="form-group">
                <input type="hidden" name="nocontroldep" class="form-control" id="nocontroldep"  value= "<?php echo $NoControl ?>">
                <div class="card card-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header"> <b> Datos de la dependencia </b> </div>
                    <div class="card-body">
                        <div class="card-text col-sm"> <b> Dependencia: </b> <a id="DependenciaRep"> </a> </div>
                        <div class="card-text col-sm"> <b> Titular: </b> <span id="TDependenciaRep"> </span> </div>
                        <div class="card-text col-sm"> <b> Puesto: </b> <span id="TPuestoRep"> </span> </div>
                        <div class="card-text col-sm"> <b> Correo: </b> <span id="correodep"> </span> </div>
                        <div class="card-text col-sm"> <b> Contacto: </b> <span id="contactodep"> </span> </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>

        <br>
        <?php 
        include("includes/footerSesion.php"); 
        ?>
                <script src= "public/js/inicio/datosDependencia.js"></script>
        <script>
            let NoControl = '<?php echo $NoControl; ?>'
            datosDependencia(NoControl);
        </script>
        <?php
} else {
    header("location:index.php");
}
?>
