<?php
    include "header.php";
    if (isset($_SESSION['alumno']) && $rol == 4) {
        $NoControl= $_SESSION['alumno']['nocontrol'];
?>
<form id="frmAutoEv" action="formatos/tecnm04.php" method="post" target="_blank">
<div class="container">
    
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw-light">FORMATO PARA REPORTE BIMESTRAL DE SERVICIO SOCIAL</h1>
            <br>
            <div class="container">
            <div class="row">
            <center>
                        <h4>
                            <b>Numero de reporte</b>
                        </h4>
                    </center>
            <div class="col-md-4"> 
              <label for="numeroReporte" class="control-label">Numero de reporte: </label>
              <select class="form-control" id="numeroReporte" name="numeroReporte">
                  <option value="1">Primero</option>
                  <option value="2">Segundo</option>
                  <option value="3">Tercero</option>
                  <option value="Final">Final</option>
              </select>
            </div>
            <center>
                        <h4>
                            <b>Datos del prestante</b>
                        </h4>
                    </center>
                    <br>
            <div class="col-md-4">
                <label for="apellidoPRep">Apellido Paterno:</label>
                <input type="text" name="apellidoPRep" class="form-control" id="apellidoPRep">
            </div>
            <div class="col-md-4">
                <label for="apellidoMRep">Apellido Materno:</label>
                <input type="text" name="apellidoMRep" class="form-control" id="apellidoMRep">
            </div>
            <div class="col-md-4">
                <label for="NombreRep">Nombre(s):</label>
                <input type="text" name="NombreRep" class="form-control" id="NombreRep">
                <br>
            </div>
            <div class="col-md-4">
                <label for="carreraRep">carrera:</label>
                <input type="text" name="carreraRep" class="form-control" id="carreraRep">
            </div>
            <div class="col-md-4">
                <label for="nocontrolRep">No. de Control:</label>
                <input type="text" name="nocontrolRep" class="form-control" id="nocontrolRep"  value= "<?php echo $NoControl ?>">
            </div>
            <center>
                        <h4>
                            <b>Periodo reportado</b>
                        </h4>
                    </center>
            <div class="col-md-4">
                <label for="dia1">Del Dia:</label>
                <input type="text" class="form-control datepicker" name="dia1" id="dia1" placeholder="Ejemplo: 4" required>
                <br>
            </div>
            <div class="col-md-4">
                <label for="mes1">Del Mes:</label>
                <input type="text" class="form-control datepicker" name="mes1" id="mes1" placeholder="Ejemplo: Febrero" required>
                <br>
            </div>
            <div class="col-md-4">
                <label for="year1">Del Año:</label>
                <input type="text" class="form-control datepicker" name="year1" id="year1" placeholder="Ejemplo: 2023" required>
                <br>
            </div>
            <div class="col-md-4">
                <label for="dia2">Al Dia:</label>
                <input type="text" class="form-control datepicker" name="dia2" id="dia2" placeholder="Ejemplo: 4" required>
                <br>
            </div>
            <div class="col-md-4">
                <label for="mes2">Al Mes:</label>
                <input type="text" class="form-control datepicker" name="mes2" id="mes2" placeholder="Ejemplo: Abril" required>
                <br>
            </div>
            <div class="col-md-4">
                <label for="year2">Al Año:</label>
                <input type="text" class="form-control datepicker" name="year2" id="year2" placeholder="Ejemplo: 2023" required>
                <br>
            </div>
            <div class="col-md-6">
                <label for="horasRep">Total de horas de este reporte:</label>
                <input type="text" name="horasRep" class="form-control" id="horasRep" placeholder= "Ejemplo: 160" required>
            </div>
            <div class="col-md-6">
                <label for="horasAcRep">Total de horas acumuladas:</label>
                <input type="text" name="horasAcRep" class="form-control" id="horasAcRep" placeholder= "Ejemplo: 160 (2do y 3er son 320 y 480)" required>
            </div>
            <center>
                        <h4>
                            <b>Programa y dependencia</b>
                        </h4>
                    </center>
            <div class="col-md-10">
                <label for="ProgramaRep">Programa:</label>
                <input type="text" name="ProgramaRep" class="form-control" id="ProgramaRep">
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
            <center>
                        <h5>
                            <b>Favor de ser lo mas breve posible ya que 
                              el numero de caracteres y renglones es limitado.</b>
                        </h5>
                    </center>
            <div class="form-group">
                        <label for="ActividadesRep">Resumen de Actividades:</label>
                        <br>
                        <textarea name="ActividadesRep" id="ActividadesRep" rows="4" cols="70" maxlength="450" required></textarea>
                        <div id="counter"></div>
                        </div>
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
        <script src= "public/js/inicio/datosReporte.js"></script>
        <script src="public/js/inicio/caracteres.js"></script>
        <script src="public/js/inicio/caracteres2.js"></script>
        <script>
            let NoControl = '<?php echo $NoControl; ?>'
            datosPersonalesReporte(NoControl);
        </script> 
<script src= "sass/public/js/usuarios/alumno.js"></script>
    <?php
        } else {
            header("location:index.php");
        }
    ?>