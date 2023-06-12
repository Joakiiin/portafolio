<?php
    include "header.php";
    if (isset($_SESSION['alumno']) && $rol == 4) {
        $NoControl= $_SESSION['alumno']['nocontrol'];
?>
<form id="frmAutoEv" action="formatos/tecnm08.php" method="post" target="_blank">
<div class="container">
    
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw-light">FORMATO DE EVALUACION CUALITATIVA DEL PRESTADOR DE SERVICIO SOCIAL</h1>
            <br>
            <div class="container">
            <div class="row">
            <center>
                        <h4>
                            <b>Datos del prestante</b>
                        </h4>
                    </center>
                    <br>
            <div class="col-md-4">
                <label for="apellidoPA">Apellido Paterno:</label>
                <input type="text" name="apellidoPA" class="form-control" id="apellidoPA">
            </div>
            <div class="col-md-4">
                <label for="apellidoMA">Apellido Materno:</label>
                <input type="text" name="apellidoMA" class="form-control" id="apellidoMA">
            </div>
            <div class="col-md-4">
                <label for="NombreA">Nombre(s):</label>
                <input type="text" name="NombreA" class="form-control" id="NombreA">
                <br>
            </div>
            <div class="col-md-4">
                <label for="nocontrolA">No. de Control:</label>
                <input type="text" name="nocontrolA" class="form-control" id="nocontrolA"  value= "<?php echo $NoControl ?>">
            </div>
            <div class="col-md-4">
                <label for="PeriodoA">Periodo:</label>
                <input type="text" name="PeriodoA" class="form-control" id="PeriodoA">
                <br>
            </div>
            <div class="col-md-10">
                <label for="ProgramaA">Programa:</label>
                <input type="text" name="ProgramaA" class="form-control" id="ProgramaA">
                <br>
            </div>
            <center>
                <h4>
                    <b>Fechas de evaluacion</b>
                </h4>
            </center>
            <center>
                <h5>
                    <b>Para poder llenar estos campos su fecha de inicio del bimestre haz
                        de sumarle dos meses como se muestra en el ejemplo de abajo.
                    </b>
                </h5>
            </center>
            <br>
            <div class="col-md-6">
                <label for="fechaIA">Fecha de inicio de primer bimestre:</label>
                <input type="text" class="form-control datepicker" name="fechaIA" id="fechaIA" placeholder="Ej: 08-03-2023">                               
            </div>
            <div class="col-md-6">
                <label for="fechaTA">Fecha de terminacion de primer bimestre:</label>
                <input type="text" class="form-control datepicker" name="fechaTA" id="fechaTA" placeholder="Ej: 08-05-2023">
                <br>
            </div>
            <div class="col-md-4"> 
            <label for="bimestre" class="control-label">Bimestre: </label>
            <select class="form-control" id="bimestre" name="bimestre" >
                <option value="1">Primero</option>
                <option value="2">Segundo</option>
                <option value="3">Tercero</option>
            </select>
            </div>
            <div class="col-md-4">
                <label for="final">Final:</label>
                <input type="checkbox" class="form-check-input" name="final" id="final" value="X">
                <br>
            </div>
            <div class="col-md-10">
                <label for="DependenciaRep">Dependencia:</label>
                <input type="text" name="DependenciaRep" class="form-control" id="DependenciaRep">
                <br>
            </div>
            <div class="col-md-10">
                <label for="TDependenciaRep">Titular de la Dependencia:</label>
                <input type="text" name="TDependenciaRep" class="form-control" id="TDependenciaRep">
                <br>
            </div>
            <div class="col-md-10">
                <label for="TPuestoRep">Puesto:</label>
                <input type="text" name="TPuestoRep" class="form-control" id="TPuestoRep">
                <br>
            </div>
            <br>
    <input type="submit" value="Generar PDF">
            </div>
        </div>
        </div>
    </div>
</div>
    </form>
<?php 
    include "includes/footerSesion.php";
    
    ?>
        <script src= "public/js/inicio/datosAutoEv.js"></script>
        <script>
            let NoControl = '<?php echo $NoControl; ?>'
            datosAutoEvaluacion(NoControl);
        </script> 
                <script>
$(document).ready(function() {
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: true
    });
});
</script>
<script src= "sass/public/js/usuarios/alumno.js"></script>
    <?php
        } else {
            header("location:index.php");
        }
    ?>